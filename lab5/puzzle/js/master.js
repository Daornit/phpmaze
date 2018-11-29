let status = {
  isStarted: false,
  count: 0,
  selectedEl: [null,null],
  howIsSelectedDiv: [null,null],
  startedTime: null,
  control: 0,
  isSelected: function(n){
      if(n==0){
        this.isStarted = true;
        this.startedTime = new Date();
        document.getElementById('button').style.display = 'none';
        for(let i=1;i<=16;i++){
          let k = this.randomInt(0,this.arr.length-1);
          document.querySelector(`.games > .item:nth-child(${i})`).innerHTML = this.arr.splice(k, 1);
          $(`.games > .item:nth-child(${i}) > img`).fadeIn("fast");
        }
        for(let i=1;i<=16;i++){
          $(`.games > .item:nth-child(${i}) > img`).delay(1000).fadeOut();
        }
      }
      if(this.isStarted){
        if(n!=0){
          if(this.selectedEl[0]==null || this.selectedEl[1]==null){
            $(`.games > .item:nth-child(${n}) > img`).fadeIn("fast");
            var val = $(`.games > .item:nth-child(${n}) > img`).attr("for");
            this.selectedEl[this.count]=val;
            this.howIsSelectedDiv[this.count] = n;
            this.count++;
            if(this.count==2){
              if(this.selectedEl[0]!=this.selectedEl[1]){
                $(`.games > .item:nth-child(${this.howIsSelectedDiv[0]}) > img`).delay(300).fadeOut();
                $(`.games > .item:nth-child(${this.howIsSelectedDiv[1]}) > img`).delay(300).fadeOut();
                this.count = 0;
                this.selectedEl=[null,null];
                this.howIsSelectedDiv=[null,null];
              }else{
                if(this.control<7){
                  if(this.howIsSelectedDiv[0]!=this.howIsSelectedDiv[1]){
                    this.control++;
                    $(`.games > .item:nth-child(${this.howIsSelectedDiv[0]})`).addClass("hider");
                    $(`.games > .item:nth-child(${this.howIsSelectedDiv[1]})`).addClass("hider");
                    this.count = 0;
                    this.selectedEl=[null,null];
                    this.howIsSelectedDiv=[null,null];
                  }else{
                    $(`.games > .item:nth-child(${this.howIsSelectedDiv[0]}) > img`).delay(300).fadeOut();
                    $(`.games > .item:nth-child(${this.howIsSelectedDiv[1]}) > img`).delay(300).fadeOut();
                    this.count = 0;
                    this.selectedEl=[null,null];
                    this.howIsSelectedDiv=[null,null];
                  }
                }else{
                  let time = new Date();
                  let finishSec = null;
                  if(this.startedTime.getMinutes() != time.getMinutes()){
                    finishSec = (time.getMinutes() - this.startedTime.getMinutes())*60 + time.getSeconds();
                  }else{
                    finishSec = time.getSeconds() - this.startedTime.getSeconds();
                  }
                  document.querySelector(`.games > .item:nth-child(${this.howIsSelectedDiv[0]})`).style.visibility = 'hidden';
                  document.querySelector(`.games > .item:nth-child(${this.howIsSelectedDiv[1]})`).style.visibility = 'hidden';
                  document.getElementById('Result').innerHTML = `Та ${finishSec} секүндэд яллаа.`;
                  $('#Result').fadeIn('slow');
                  $('#reset').fadeIn('slow');
                }
              }
            }
          }
        }
      }
  },
  randomInt:function(min,max){
    return Math.floor(Math.random() * (max - min + 1)) + min;
  },
  arr:[
    '<img src="/imgs/1.jpg" width="90" height="90" for="1">',
    '<img src="/imgs/1.jpg" width="90" height="90" for="1">',
    '<img src="/imgs/2.jpeg" width="90" height="90" for="2">',
    '<img src="/imgs/2.jpeg" width="90" height="90" for="2">',
    '<img src="/imgs/3.jpg" width="90" height="90" for="3">',
    '<img src="/imgs/3.jpg" width="90" height="90" for="3">',
    '<img src="/imgs/4.jpg" width="90" height="90" for="4">',
    '<img src="/imgs/4.jpg" width="90" height="90" for="4">',
    '<img src="/imgs/5.png" width="90" height="90" for="5">',
    '<img src="/imgs/5.png" width="90" height="90" for="5">',
    '<img src="/imgs/6.jpg" width="90" height="90" for="6">',
    '<img src="/imgs/6.jpg" width="90" height="90" for="6">',
    '<img src="/imgs/7.png" width="90" height="90" for="7">',
    '<img src="/imgs/7.png" width="90" height="90" for="7">',
    '<img src="/imgs/8.png" width="90" height="90" for="8">',
    '<img src="/imgs/8.png" width="90" height="90" for="8">'
  ]
}
