//clock1
const now = new Date();
const valM = now.getMinutes(), valS = now.getSeconds(), valH = now.getHours();
const degS = valS * 6;  //360/60=> 6度/秒
const degM = valM * 6 + valS * 0.1; //分針在一個刻度間，會隨著秒數增加有些微偏移，因此算完整點的角度還要加上偏移量
const degH = valH * 30 + valM * 0.5;

// 方法一 document.write

//方法二
let kf=document.createElement('style');
kf.innerHTML=`
    @keyframes js{
      from{
        transform: rotate(${degS}deg);
      }
      to{
        transform: rotate(${degS+360}deg);
        
      }
    }
    @keyframes jm{
      from{
        transform: rotate(${degM}deg);
      }
      to{
        transform: rotate(${degM+360}deg);
        
      }
    }
    @keyframes jh{
      from{
        transform: rotate(${degH}deg);
      }
      to{
        transform: rotate(${degH+360}deg);
        
      }
    }`;
document.querySelector("head").append(kf);


//clock5

onload=()=>{
  const domH=document.querySelectorAll(".no4>.jhour1");
  const domM=document.querySelectorAll(".no4>.jmin1");
  const domS=document.querySelectorAll(".no4>.jsec1");

  domH.style.transform=`rotate(${degH}deg)`;
  domM.style.transform=`rotate(${degM}deg)`;
  domS.style.transform=`rotate(${degS}deg)`;
  
  setInterval(function(){
    const now = new Date();
    const valM = now.getMinutes(), valS = now.getSeconds(), valH = now.getHours();
    const degS = valS * 6;  //360/60=> 6度/秒
    const degM = valM * 6 + valS * 0.1; //分針在一個刻度間，會隨著秒數增加有些微偏移，因此算完整點的角度還要加上偏移量
    const degH = valH * 30 + valM * 0.5;
    
    domH.style.transform=`rotate(${degH}deg)`;
    domM.style.transform=`rotate(${degM}deg)`;
    domS.style.transform=`rotate(${degS}deg)`;
  },1000);
}
