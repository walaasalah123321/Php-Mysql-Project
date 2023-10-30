let menu =document.querySelector(".button")
let lists=document.querySelector(".links")
let filter=document.querySelectorAll(".filter .col-lg-3")
let filterALL=document.querySelector(".filter")
let list_department=document.querySelectorAll(".chose ul li")
console.log(filter)
console.log(filterALL)
menu.onclick=function(){
    lists.classList.toggle("links_container")
}

let select_department=document.querySelectorAll(".doctor .chose ul li")
select_department.forEach(item => {
    
    
    item.onclick=function(){
        select_department.forEach(item2=>{
            if(item==item2)         item.classList.add("active")
            else  item2.classList.remove("active")



        })
    }
});

let value=""
list_department.forEach(item=>{
item.addEventListener('click',function(){

    let newdiv=""
    value=item.innerHTML;
    if(value=="All Department"){
        filter.forEach(item=>{
        newdiv+=`<div class="col-lg-3 col-md-4 par">
        ${item.innerHTML}
        </div>`
        })
    }
    filter.forEach(item=>{
                if(item.classList.contains(value)){
            newdiv+=`<div class="col-lg-3 col-md-4 ${value} par">
             ${item.innerHTML}
             </div>
             `
            }
            
    })
    console.log(newdiv)
    
    filterALL.innerHTML=newdiv
   


})

})



