//DOM節點取得
let animal=document.getElementsByTagName("img");


let time=document.getElementById("time");  //dom time
let combo=document.getElementById("combo");  //dom combo

let sec=0,count=0;

let btn=document.getElementsByTagName("button")[0];  //button
btn.addEventListener('click',gameStart);

document.onkeydown=keyboard;


function gameStart(){
  sec=60;
  count=0;
  time.textContent=sec;
  combo.textContent=count;
  btn.removeEventListener("click",gameStart);
  
  
  const start=setInterval(() => {
    if(sec==0){
      clearInterval(start);  //清除倒數器
      btn.addEventListener("click",gameStart);

    }else{
      sec--;
      time.textContent=sec;
    }
  }, 1000);

  for(let i=0;i<100;i++){  //產生100個紅色狀態
    const onTime=Math.floor(Math.random()*57000); //0~56999ms
    const onWhere=Math.floor(Math.random()*9); //0~8 出現處
    const onDelay=Math.floor(Math.random()*3)+2; //2~4s 滯留時間

    setTimeout(() => {
      showIt(onWhere,onDelay,i);
    }, onTime);
  }
}

function showIt(where,delay,item){ //觸發紅色狀態
  if(animal[where].style.backgroundColor!=""){  //不是黃色，不能觸發紅色狀態
    // const next=(where!=8)?where+1:0 方法一
    const next=(where+1)%9;  //方法二

    setTimeout(() => {
      showIt(next,delay,item);
    }, 100);

  }else{
    animal[where].src="red.png";
    animal[where].style.backgroundColor="red";
    animal[where].alt=item;

    setTimeout(() => {
      animal[where].src="yellow.png";
      animal[where].style.backgroundColor=null;
      animal[where].alt=null;
    }, delay*1000);
  }
    
}

function keyboard(){
  // console.log(event.keyCode);
  switch(event.keyCode){
    case 103:
      getCombo(0)
    break;
    case 104:
      getCombo(1)
    break;
    case 105:
      getCombo(2)
    break;
    case 100:
      getCombo(3)
    break;
    case 101:
      getCombo(4)
    break;
    case 102:
      getCombo(5)
    break;
    case 97:
      getCombo(6)
    break;
    case 98:
      getCombo(7)
    break;
    case 99:
      getCombo(8)
    break;

    }
}

function getCombo(item){  //只有在紅色狀態下得分
  if(animal[item].style.backgroundColor=="red"){
    animal[item].src="green.png";
    animal[item].style.backgroundColor="green";
    
    count++;
    combo.textContent=count;

    setTimeout(() => {  //綠色1秒後會自動轉回黃色
      animal[where].src="yellow.png";
      animal[where].style.backgroundColor=null;
      animal[where].alt=null;
    }, 1000);
  }
}






