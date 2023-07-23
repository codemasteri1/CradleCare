const body = document.querySelector("body"),
        nav = document.querySelector("nav"),
        modeToggle = document.querySelector(".dark-light"),
        searchToggle = document.querySelector(".searchToggle"), 
        sidebarOpen = document.querySelector(".sidebarOpen"),
        sidebarClose = document.querySelector(".sidebarClose");




//js code to toggle bar and light mode
        modeToggle.addEventListener ("click" , () =>{
                modeToggle.classList.toggle("active");
                body.classList.toggle("dark");
        });


//js code to toggle search box
        searchToggle.addEventListener ("click" , () =>{
        searchToggle.classList.toggle("active")
});
        


//  js code for sidebar

sidebarOpen.addEventListener("click" ,() =>{
        nav.classList.add("active");
});



body.addEventListener("click" , e =>{
      let clickedElm = e.target;
          if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
                nav.classList.remove("active");  
          }
}); 