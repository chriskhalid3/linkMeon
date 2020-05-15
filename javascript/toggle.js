
const forgotDisplay = () =>{
   
document.addEventListener('DOMContentLoaded',()=>{ 
   
   anime.timeline({

   })
    .add({
       targets:'#sign-form',
       opacity:[5,0],
       easing:'easeInOutQuad',
       complete:(anim)=> document.getElementById('sign-form').style.display='none'
   })
   .add({
    targets:'#passreset',
    opacity:[0,1],
    easing:'easeInOutQuad',
    complete:(anim)=> document.getElementById('passreset').style.display='block'
})

 
});
}
forgotDisplay();

