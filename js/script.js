let show_img=document.getElementById("pass-show");
let show_in=document.getElementById("pass-in");
let def_img=show_img.getAttribute("src");
let status_show=true;
show_img.addEventListener("click",()=>{
  if(status_show==true){
    show_img.setAttribute("src",`img/show_pass.png`);
    show_in.setAttribute("type","text");
    status_show=false;
  }
  else{
  	show_img.setAttribute("src",def_img);
  	show_in.setAttribute("type","password");
    status_show=true;
  }
})
