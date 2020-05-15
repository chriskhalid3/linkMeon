const navslide = () =>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.navbars-nav');
    const navLinks = document.querySelectorAll('.navbars-nav li')
    
    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
         //annimate links
    navLinks.forEach((link,index)=>{

        if(link.style.animation){
            link.style.animation = '';
            }
        else{
            link.style.animation =`navLinkSlide 0.5s ease forwards ${index / 7 + 0.5}s`;            
        } 
      });
  //bur animation
   burger.classList.toggle('focus');
 
    });
   
}

navslide();

//for search
function displaySearchValue(){

 var searchBox = document.getElementById('searchBox');   

 searchBox.addEventListener('keyup',function(){
     //to bring up seacrh box
  anime.timeline({})
  .add({
      targets:'#resultfield',
      opacity:[0,1],
    
      complete:()=>{
        searchBoxValue = document.getElementById('searchBox').value.trim(); 
          if(searchBoxValue == ''){
              //to return it to opacity 0
            anime.timeline({})
                .add({
                    targets:'#resultfield',
                    opacity:[1,0],
                                 
                });
                }            
         }
  })

});
// this form moveBy reasult-mob
var searchBoxMob = document.getElementById('searchbox-mob');  
  searchBoxMob.addEventListener('keyup',()=>{
     anime.timeline({

     })
     .add({
         targets:'#reasult-mob',
         opacity:[0,1],
         position:'relative',
         complete:()=>{
            searchBoxValue = document.getElementById('searchbox-mob').value.trim(); 
              if(searchBoxValue == ''){
                  //to return it to opacity 0
                anime.timeline({})
                    .add({
                        targets:'#resultfield',
                        opacity:[1,0],                                    
                    });
                    }
                  
             }
     })
  });

};
displaySearchValue();

var userEditForm = document.getElementById('user-edit-form');
   
const pushMeUp = ()=>{
  
    var editInfo = document.getElementById('editInfo');
    var Newcourse = document.getElementById('Newcourse');

if(editInfo !== null ){
    editInfo.addEventListener('click',()=>{
        editInfo.style.color = 'rgb(13, 130, 226)';
        Newcourse.style.color = '';
        $('#user-edit-form').load('include/user_info.php',{
            userInfo:1
        });
        anime.timeline({})
        .add({
              targets:'#user-edit-form',
              opacity:[0,1],
              easing:'easeInOutQuad'
        })
        

    });
}

if(Newcourse !== null){
    Newcourse.addEventListener('click',()=>{
        editInfo.style.color = '';
        Newcourse.style.color = 'rgb(13, 130, 226)';
    $('#user-edit-form').load('include/class_form.php',{
        newCourse:1  
    });
        anime.timeline({})
        .add({
               targets:'#user-edit-form',
               opacity:[0,1],
               easing:'easeInOutQuad'
        })
       
    });
}
document.addEventListener('DOMContentLoaded',()=>{  
    editInfo.style.color = 'rgb(13, 130, 226)';
});

}
pushMeUp();

const paginationLeader = ()=>{
    var course = document.getElementById('class');
    var friend = document.getElementById('friend');
    var AddCourse = document.getElementById('add-course');
    var chat   = document.getElementById('chat');
    var pageleader = document.getElementById('page-leader');
   


  if(course !== null){  
      

document.addEventListener('DOMContentLoaded',()=>{
    course.style.color = 'rgb(13, 130, 226)';
  
    $.ajax({
        
        url:'include/load_course.php',
        method:'POST',
        data:{
         war:1
          },
        success:(data)=>{            
            pageleader.innerHTML = data;
        },
        dataType:'text'
     });
    });
    
    course.addEventListener('click',()=>{
     
     chat.style.color =''; 
     AddCourse.style.color =''; 
     friend.style.color ='';       
     course.style.color = 'rgb(13, 130, 226)';
      $.ajax({
        
        url:'include/load_course.php',
        method:'POST',
        data:{
         war:1
          },
        success:(data)=>{
            
            pageleader.innerHTML = data;
        },
        dataType:'text'

     });
    });
}

if(AddCourse !== null){
    AddCourse.addEventListener('click',()=>{
    
     chat.style.color =''; 
     AddCourse.style.color ='rgb(13, 130, 226)'; 
     friend.style.color ='';       
     course.style.color = '';

     $.ajax({
         url:'include/find_course.php',
         method:'POST',
         data:{
             allCourse: 1
         },
         success:(data)=>{
          pageleader.innerHTML = data; 
         },
         dataType:'text'
     });

    });
}

if(friend !== null ){
    friend.addEventListener('click',()=>{
        
        chat.style.color =''; 
        AddCourse.style.color =''; 
        friend.style.color ='rgb(13, 130, 226)';       
        course.style.color = '';
     $.ajax({
        url:'include/load_my_friends.php',
        method:'POST',
        data:{
            allfriend: 1
        },
        success:(data)=>{
         pageleader.innerHTML = data; 
        },
        dataType:'text'

     });
    });
}

if(chat !== null){
    chat.addEventListener('click',()=>{
        chat.style.color ='rgb(13, 130, 226)'; 
        AddCourse.style.color =''; 
        friend.style.color ='';       
        course.style.color = '';
     $.ajax({
        url:'include/load_chat.php',
        method:'POST',
        data:{
            allChat: 1
        },
        success:(data)=>{
         pageleader.innerHTML = data; 
        },
        dataType:'text'

     });
    });
}



};
paginationLeader();


