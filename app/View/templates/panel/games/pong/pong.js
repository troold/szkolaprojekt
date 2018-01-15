
var animate = window.requestAnimationFrame ||
  window.webkitRequestAnimationFrame ||
  window.mozRequestAnimationFrame ||
  function(callback) { window.setTimeout(callback, 1000/60) };

var canvas = document.createElement('canvas');
var width = 600;
var height = 400;
canvas.width = width;
canvas.height = height;
var context = canvas.getContext('2d');
var player = new Player();
var computer = new Computer();
var ball = new Ball(300, 200);
var keysDown = {};
var dMultiplier = 1;
var cpuScore = 0;
var playerScore = 0;
var scoreLimit = 20;
var timeLimit = 300;
var timePassed = 0;
var timer;
var gameOver = false;

window.onload = function() {
  document.getElementById('game').appendChild(canvas);
  render();

  $('.start-game').click(function(){
    animate(step);
    $('.menu').css('display', 'none');
    timer = setInterval(timeCounter, 1000);
  });

  $('.easy').click(function(){
    dMultiplier = 1;
  });

  $('.inter').click(function(){
    dMultiplier = 2;
  });

  $('.hard').click(function(){
    dMultiplier = 3;
  });

};

var timeCounter = function(){
  timePassed += 1;
  console.log(timePassed);
}

var step = function() {
  update();
  render();
  animate(step);
};

var render = function() {
  context.fillStyle = "#000";
  context.fillRect(0, 0, width, height);
  player.render();
  computer.render();
  ball.render();
};

function Paddle(x, y, width, height) {
  this.x = x;
  this.y = y;
  this.width = width;
  this.height = height;
  this.x_speed = 0;
  this.y_speed = 0;
}

Paddle.prototype.render = function() {
  context.fillStyle = "#fff";
  context.fillRect(this.x, this.y, this.width, this.height);
};

function Player() {
  this.paddle = new Paddle(275, 380, 50, 10);
}

function Computer() {
  this.paddle = new Paddle(275, 10, 50, 10);
}

Player.prototype.render = function() {
  this.paddle.render();
};

Computer.prototype.render = function() {
  this.paddle.render();
};

function Ball(x, y) {
  this.x = x;
  this.y = y;
  this.x_speed = 0;
  this.y_speed = 3;
  this.radius = 5;
}

Ball.prototype.render = function() {
  context.beginPath();
  context.arc(this.x, this.y, this.radius, 2 * Math.PI, false);
  context.fillStyle = "#fff";
  context.fill();
};

var update = function() {
  if((timePassed<timeLimit) && (playerScore < scoreLimit) && (cpuScore < scoreLimit)){
    player.update();
    computer.update(ball);
    ball.update(player.paddle, computer.paddle);
  }else{
    if(!gameOver){
      gameOver = true;
      clearInterval(timer);
      $('.game-over').css('display', 'flex');
      if(playerScore>cpuScore)
        $('.over-text').html('Wygrałeś!<br/> zdobyłeś '+(playerScore*dMultiplier)+' punktów!');
      else if(playerScore<cpuScore)
        $('.over-text').html('Przegrałeś!<br/> zdobyłeś '+playerScore*dMultiplier+' punktów!');
      else
        $('.over-text').html('Remis!<br/> zdobyłeś '+playerScore*dMultiplier+' punktów!');
      $.ajax({
        url: '{$router->publicWeb("apiv1,panel,users/one")}',
        type: "GET",
        success: function success(response) {
          console.log(response);
          if(response.return){
            var userData = response.response;
            var submitScore = parseInt(playerScore*dMultiplier);
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
  }
};

function assignScore(pos){
  console.log(pos)
  if(pos>200){
    cpuScore++;
    $('#cpuPoints').html(cpuScore);
  }else{
    playerScore++;
    $('#playerPoints').html(playerScore);
  }
 }

Ball.prototype.update = function(paddle1, paddle2) {
  this.x += this.x_speed*dMultiplier;
  this.y += this.y_speed*dMultiplier;
  var top_x = this.x - 5;
  var top_y = this.y - 5;
  var bottom_x = this.x + 5;
  var bottom_y = this.y + 5;

  if(this.x - 5 < 0) { // hitting the left wall
    this.x = 5;
    this.x_speed = -this.x_speed;
  } else if(this.x + 5 > 600) { // hitting the right wall
    this.x = 595;
    this.x_speed = -this.x_speed;
  }

  if(this.y < 0 || this.y > 400) { // a point was scored
    assignScore(this.y);
    this.x_speed = 0;
    this.y_speed = 3;
    this.x = 300;
    this.y = 200;    
  }


  
  if(top_y > 300) {
    if(top_y < (paddle1.y + paddle1.height) && bottom_y > paddle1.y && top_x < (paddle1.x + paddle1.width) && bottom_x > paddle1.x) {
      // hit the player's paddle
      if(paddle1.x_speed!=0){
        this.y_speed = -3;
        this.x_speed = (paddle1.x_speed / 2);
        this.y += this.y_speed;
      }else{
        if((this.x-paddle1.x)>0){
          this.y_speed = -3;
          this.x_speed = (((((this.x-paddle1.x)-25)*-1)/25)*4)*-1;
          this.y += this.y_speed;
        }else{
          this.y_speed = -3;
          this.x_speed = ((((this.x-paddle1.x)-25)*-1)/25)*4;
          this.y += this.y_speed;
        }
      }
    }
  } else {
    if(top_y < (paddle2.y + paddle2.height) && bottom_y > paddle2.y && top_x < (paddle2.x + paddle2.width) && bottom_x > paddle2.x) {
      // hit the computer's paddle
      if(paddle2.x_speed!=0){
        this.y_speed = 3;
        this.x_speed = (paddle2.x_speed / 2);
        this.y += this.y_speed;
      }else{
        if((this.x-paddle2.x)>0){
          this.y_speed = 3;
          this.x_speed = (((((this.x-paddle2.x)-25)*-1)/25)*4)*-1;
          this.y += this.y_speed;
        }else{
          this.y_speed = 3;
          this.x_speed = ((((this.x-paddle2.x)-25)*-1)/25)*4;
          this.y += this.y_speed;
        }
      }
    }
  }
};

window.addEventListener("keydown", function(event) {
  keysDown[event.keyCode] = true;
});

window.addEventListener("keyup", function(event) {
  player.paddle.x_speed = 0;
  delete keysDown[event.keyCode];
});

Player.prototype.update = function() {
  for(var key in keysDown) {
    var value = Number(key);
    if(value == 37) { // left arrow
      this.paddle.move(-4*dMultiplier, 0);
    } else if (value == 39) { // right arrow
      this.paddle.move(4*dMultiplier, 0);
    } else {
      this.paddle.move(0, 0);
    }
  }
};

Paddle.prototype.move = function(x, y) {
  this.x += x;
  this.y += y;
  this.x_speed = x;
  this.y_speed = y;
  if(this.x < 0) { // all the way to the left
    this.x = 0;
    this.x_speed = 0;
  } else if (this.x + this.width > 600) { // all the way to the right
    this.x = 600 - this.width;
    this.x_speed = 0;
  }
}

Computer.prototype.update = function(ball) {
  var x_pos = ball.x;
  var diff = -((this.paddle.x + (this.paddle.width / 2)) - x_pos);
  if(diff < 0 && diff < -4) { // max speed left
    diff = -3*dMultiplier;
  } else if(diff > 0 && diff > 4) { // max speed right
    diff = 3*dMultiplier;
  }
  this.paddle.move(diff, 0);
  if(this.paddle.x < 0) {
    this.paddle.x = 0;
  } else if (this.paddle.x + this.paddle.width > 600) {
    this.paddle.x = 600 - this.paddle.width;
  }
};