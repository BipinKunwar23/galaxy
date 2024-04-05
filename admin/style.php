<style>
*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}
.container{
display: grid;
grid-template-columns: 200px 1fr;
grid-template-rows: min-content;
padding: 20px;
grid-gap: 20px;
border: solid 1px red;

}
.action{
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: repeat(7, 1fr);
    padding: 10px;
    grid-gap: 40px;
    align-self: start;
    background-color: violet;
    color: white;
    border: solid 1px gray;
    position: sticky;
    top: 0%;
}
.action  button{
    display: block;
    width: 100%;
    height: 40px;

}
.content{
    display: grid;
    grid-template-columns:100%;
    grid-template-rows: repeat(5,min-content);
    grid-gap: 10px;
    position: relative;
}
.message{
    position: absolute;
    left: 20%;
    color: white;
    background-color: #5112FF;
    border-radius: 10px;
    padding: 20px;
    display: none;
}

.insert div{
    display: grid;
    grid-template-columns:repeat(2,100px);
    grid-gap: 30px;
}
.form_catagory{
    display: grid;
    margin: auto auto;
    grid-template-columns: 100%;
    grid-template-rows: repeat(all,min-content);
    background-color: cyan;
    padding: 40px;
    grid-gap: 10px;


}
.form_catagory span{
    display: block;
    font-size: 16px;
    margin-top: 5px;
}
.form_catagory input,select{
    width: 100%;
    height: 30px;
}
.form_catagory textarea{
    width: 100%;

}
.imagePreview{
    display: none;
    height: 200px;
}
.imagePreview img{
    width: 100%;
    height: 100%;
}
.table{
    display: grid;   
     grid-template-columns: 100%;
     grid-template-rows: repeat(auto-fit, min-content);
     grid-gap: 10px;
     justify-content: center;
}
.catagory_table{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    border: solid 1px gray;

}

.catagory_image img{
    width: 100%;
    height: 100%;

}
.descp{
    display: grid;
    grid-column: 2/4;
    grid-template-columns: 100%;
    grid-template-rows: repeat(auto-fill,min-content);
    padding: 20px;
    background-color: skyblue;
    grid-gap: 10px;
    align-content: start;

}
.descp>:first-child span{
    font-size: 21px;
    font-weight: 500;
}
.catagoryInfo,.catagoryPrice{
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: repeat(auto-fit,min-content);
    grid-gap: 10px;
    padding: 5px;

}
.catagoryPrice div{
justify-self: center;
font-size: 20px;
}
.guest,.catagoryAction{
    display: grid;
    grid-template-columns: repeat(2,1fr);
    grid-template-rows: min-content;
    padding: 5px;
    grid-gap: 5px;

}.catagoryAction div button{
    padding: 8px;
    width: 100%;
}

.modelbox{
    display: grid;
    grid-template-columns: repeat(2,1fr);

}
#close-Btn{
    align-self: start;
    justify-self: end;
}
#close-Btn button{
    padding: 5px;
    color: red;
    font-size: 20px;
    border-radius: 50%;

}

.image-preview{
    height: 250px;
}

.image-preview img{
    width: 100%;
    height: 100%;
}

.floor_table{
    width: 100%;
    padding: 10px;
    border: 1px solid red;
    border-collapse: collapse;
}
.floor_table th, tr,td{
    border: 1px solid gray;
    padding: 10px;
}
.room-container{
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: repeat(auto-fit,min-content);
    padding: 10px;
}
.color{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(80px,1fr));
    grid-gap: 2px;
    padding: 5px;


}
.color div{
    display: grid;
    grid-template-columns: 20px 1fr;
    grid-template-rows: min-content;
    grid-auto-rows: 20px;
    grid-gap: 5px;
}
.room_table{
    display: grid;
    grid-template-columns: repeat(auto-fit,150px);
    grid-template-rows: 150x;
    grid-auto-rows: 150px;
    grid-gap: 20px;
}
.statusContain{
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 100%;
    grid-auto-rows: min-content;
    position: relative;
}
.roomstatus{
    border: solid 1px gray;
    background-color: #5112FF;
    color: #000;
    border-radius: 10px;
    display: grid;
    justify-content: center;
    align-content: center;
    box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
}



.roomstatus span{
    height: 100%;
    font-size: 50px;
    color: white;
}
.Bed{
    display: grid;
    grid-template-columns: repeat(2,1fr);
    grid-template-rows:repeat(atuo-fit,min-content);
    grid-gap: 4px 5px;


}


.Bed input{
    width: 100%;
}

.roomcontain{
    position: absolute;
    top: 0;
    background-color: white;
    color: black;
    border-radius: 4px;
}
</style>