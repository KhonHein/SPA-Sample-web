<template>
    <div>
        <div id="context-menu">
            <div class="item" onclick="history.back()">
                <i class="fa-solid fa-angles-left"></i>
            </div>
            <div class="item" onclick="history.forward()">
                <i class="fa-solid fa-angles-right"></i>
            </div>
            <div class="item">
                <i class="fa fa-refresh" onclick="location.reload()"></i>
            </div>
            <div class="item">
                <i class="fa fa-times"></i>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted () {
                            // right click
                window.addEventListener("contextmenu",(event)=>{
                event.preventDefault();
                let contextElement = document.getElementById("context-menu");
                contextElement.style.top = event.offsetY + "px";
                contextElement.style.left = event.offsetX + "px";
                contextElement.classList.add("active");
            });
            window.addEventListener("click",()=>{
                document.getElementById("context-menu").classList.remove("active")
            })
        }
    }
</script>

<style>
/* right click */

#context-menu{
    position: fixed;
    z-index: 1000000000;
    width: 70px;
    background:rgb(186, 189, 190);
    transform: scale(0);
    transform-origin: to left;
    /* border:.1px solid; */
    border-radius: 5px;
}
#context-menu.active{
    transform: scale(1);
    transition: transform 200ms ease-in-out;
}
#context-menu .item{
    padding: 8px 10px;
    font-size: 15px;
    color:black;
    margin: .1rem;
    border: .1px solid;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
}
#context-menu .item:hover{
    background-color: #8f8989;
}

#context-menu .item i{
    display: block;
    margin-right: 5px;
}
#context-menu hr {
    margin: 2px 0px;
    border-color: #555;
}
</style>
