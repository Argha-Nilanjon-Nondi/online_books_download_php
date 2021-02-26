/*directory controller start*/
let collaspe_btn=document.getElementsByClassName("directory-sub-head-button");
let collaspe_box=document.getElementsByClassName("directory-sub-collaspe")
var i,a=0;
for(i=0;i<collaspe_btn.length;i++){
   
    let block=collaspe_box[i].style;
    let btn_txt=collaspe_btn[i];
   
    collaspe_btn[i].addEventListener("click",function (){
        
     
        if(block.display=="none"){

            block.display="block";
            btn_txt.innerHTML="-";
        }
        else{
            block.display="none";
            btn_txt.innerHTML="+";
        }

    
    });

    a++;
}
/*directory controller end*/