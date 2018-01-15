var canvas = document.createElement('canvas');
var width = 600;
var height = 400;
canvas.width = width;
canvas.height = height;
var context = canvas.getContext('2d');

var dMultiplier = 0.5;
var maxPics = 0;
var stageSetting = null;

var playerScore = 0;
var finalScore = 0;

var timeLimit = 120;
var timePassed = 0;

var timer;
var spawnC;
var delC;

var gameOver = false;

var diff = 'easy';

window.onload = function() {
  document.getElementById('game').appendChild(canvas);
  render();

  $('.easy').click(function(){
    dMultiplier = 0.5;
    timeLimit = 120;
    diff = 'easy';
  });

  $('.inter').click(function(){
    dMultiplier = 1;
    timeLimit = 80;
    diff = 'medium';
  });

  $('.hard').click(function(){
    dMultiplier = 1.5;
    timeLimit = 60;
    diff = 'hard';
  });

  $('.start-game').click(function(){

    $('.menu').css('display', 'none');

    timer = setInterval(timeCounter, 1000);

    setStage(diff);

  });
};

var timeCounter = function(){
  timePassed += 1;
  update();
}

var render = function() {
  context.fillStyle = "#000";
  context.fillRect(0, 0, width, height);
};

var setStage = function(difficulty) {

  
  switch(difficulty) {
    case 'easy':
        var timeToSpawn = 1500;
        var timeToDel = 1000;
        var size = 50;
        break;
    case 'medium':
        var timeToSpawn = 1700;
        var timeToDel = 800;
        var size = 40;
        break;
    case 'hard':
        var timeToSpawn = 1850;
        var timeToDel = 550;
        var size = 30;
        break;
  }


  function drawCircle(){
    let posY = Math.floor((Math.random() * 300) + 50);
    let posX = Math.floor((Math.random() * 500) + 50);
    var circle = $( '<div class="circle"></div>' );
    $(circle).css('position', 'absolute');
    $(circle).css('left', posX+'px');
    $(circle).css('top', posY+'px');
    $(circle).css('width', size+'px');
    $(circle).css('height', size+'px');
    $(circle).css('background-color', '#66ff33');
    $(circle).css('border-radius', '100%');
    
    $('#game').append(circle);

    delC = setTimeout(clearScrn, timeToDel);

    $('.circle').on('click', function(e){
      console.log('bang')
      playerScore++;
      clearInterval(delC);
      clearScrn();
    })
  }

  setTimeout(drawCircle, timeToSpawn);

  function clearScrn() {
    $('.circle').remove();
      spawnC = setTimeout(drawCircle, timeToSpawn);
  }
}

var update = function() {

  finalScore = Math.floor(parseInt(playerScore*dMultiplier));
  if(timePassed>=timeLimit){
    $('.over-text').html('Czas się skończył!<br/> zdobyłeś '+finalScore+' punktów!');
    clearInterval(delC);
    clearInterval(spawnC);
    gameOver = true;
  }

  if(gameOver){
    clearInterval(timer);
    $('.game-over').css('display', 'flex');

    $.ajax({
      url: '{$router->publicWeb("apiv1,panel,users/one")}',
      type: "GET",
      success: function success(response) {
        console.log(response);
        if(response.return){
          var userData = response.response;
          var submitScore = finalScore;
          $.ajax({
            url: '{$router->makeUrl("apiv1,users/updateScore")}',
            type: "POST",
            data: {
              score: submitScore
            },
            success: function success(response) {
              console.log(response);
            }
          });
        }
      }
    });
  }
};