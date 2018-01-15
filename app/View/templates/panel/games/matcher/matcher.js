var canvas = document.createElement('canvas');
var width = 600;
var height = 400;
canvas.width = width;
canvas.height = height;
var context = canvas.getContext('2d');

var dMultiplier = 1;
var maxPics = 0;
var stageSetting = null;

var playerScore = 0;
var finalScore = 0;

var timeLimit = 120;
var timePassed = 0;

var timer;
var gameOver = false;

var diff = 'easy';

window.onload = function() {
  document.getElementById('game').appendChild(canvas);
  render();

  $('.easy').click(function(){
    dMultiplier = 1;
    timeLimit = 120;
    diff = 'easy';
  });

  $('.inter').click(function(){
    dMultiplier = 2;
    timeLimit = 80;
    diff = 'medium';
  });

  $('.hard').click(function(){
    dMultiplier = 3;
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
  var opened = 0;

  var allowed = true;
  
  var side = null;

  var leftHand = [];
  var rightHand = [];
  var dataArray = [];
  var easyStage = [50,200,350,500];
  var mediumStage = [50,140,230,320,410,500];
  var hardStage = [50,111.5,176,241.5,307,372.5,438,500];
  var colorsArray = ['#00ff00', '#ffff00', '#ff0000', '#ff3399', '#6600ff', '#33cccc', '#cc6600', '#666699'];

  colorsArray = shuffle(colorsArray);
  
  switch(difficulty) {
    case 'easy':
        maxPics = 4;
        stageSetting = easyStage;
        break;
    case 'medium':
        maxPics = 6;
        stageSetting = mediumStage;
        break;
    case 'hard':
        maxPics = 8;
        stageSetting = hardStage;
        break;
  }

  for(var i = 0; i < maxPics; i++){
    dataArray.push(i);
  }

  for(var numOfPics = 0; numOfPics < maxPics; numOfPics++){
    var pic = $( '<div id="'+numOfPics+'" class="pic" data-side="up"></div>' );
    $(pic).css('position', 'absolute');
    $(pic).css('left', stageSetting[numOfPics]+'px');
    $(pic).css('top', '50px');
    $(pic).css('width', '50px');
    $(pic).css('height', '100px');
    $(pic).css('background-color', 'white');
    let assignDataId = Math.floor((Math.random() * dataArray.length) + 0);
    $(pic).attr('data-carry', dataArray[assignDataId]);
    dataArray.splice(assignDataId,1);
    
    $('#game').append(pic);
  }

  for(var i = 0; i < maxPics; i++){
    dataArray.push(i);
  }

  for(var numOfPics = 0; numOfPics < maxPics; numOfPics++){
    var pic = $( '<div id="'+parseInt(numOfPics+maxPics)+'" class="pic" data-side="bottom"></div>' );
    $(pic).css('position', 'absolute');
    $(pic).css('left', stageSetting[numOfPics]+'px');
    $(pic).css('top', '250px');
    $(pic).css('width', '50px');
    $(pic).css('height', '100px');
    $(pic).css('background-color', 'white');
    let assignDataId = Math.floor((Math.random() * dataArray.length) + 0);
    $(pic).attr('data-carry', dataArray[assignDataId]);
    dataArray.splice(assignDataId,1);

    $('#game').append(pic);
  }

  $('.pic').on('click', function(e){
    if(allowed){
      if(opened == 0){
        side = $(this).attr('data-side');
        let hiddenColor = $(this).attr('data-carry');
        leftHand[0] = this;
        leftHand[1] = hiddenColor;
        $(this).css('background-color', colorsArray[hiddenColor]);
        opened++;
      }else{
        if(this != leftHand[0] && $(this).attr('data-side') != side){
          let hiddenColor = $(this).attr('data-carry');
          rightHand[0] = this;
          rightHand[1] = hiddenColor;
          $(this).css('background-color', colorsArray[hiddenColor]);
          if(leftHand[1]==rightHand[1]){
            leftHand[0] = 0;
            leftHand[1] = 0;
            rightHand[0] = 0;
            rightHand[1] = 0;
            opened = 0;
            side = null;
            playerScore++;
            checkStatus();
          }else{
            allowed = false;
            setTimeout(function(){
              $(leftHand[0]).css('background-color', '#fff');
              $(rightHand[0]).css('background-color', '#fff');
              leftHand[0] = 0;
              leftHand[1] = 0;
              rightHand[0] = 0;
              rightHand[1] = 0;
              opened = 0;
              allowed = true;
              side = null;
            }, 1500);
          }
        }
      }
    }
  })
}

var checkStatus = function(){
  if(playerScore == maxPics){
    gameOver = true;
    finalScore = Math.round(Math.sqrt(timeLimit-timePassed)+(playerScore*dMultiplier));
    $('.over-text').html('Wygrałeś!<br/> zdobyłeś '+finalScore+' punktów!');
    update();
  }
}

var update = function() {
  if(timePassed>=timeLimit){
    $('.over-text').html('Przegrałeś!<br/> zdobyłeś '+(playerScore*dMultiplier)+' punktów!');
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
          var submitScore = parseInt(finalScore);
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

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}