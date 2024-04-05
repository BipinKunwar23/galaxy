<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .container{
        display: grid;
        position: relative;
        grid-template-columns: 100%;
        grid-template-rows: max-content;
        height: 650px;
        background-image: url("https://cdn.vox-cdn.com/thumbor/X1Xa_c9IHjpZ3W6yG06pXv35sCY=/0x0:8688x5792/1200x800/filters:focal(3649x2201:5039x3591)/cdn.vox-cdn.com/uploads/chorus_image/image/65538166/PIXELLAB_PodPhilly024A9882.0.jpg");
    }
    .navbar{
        display: grid;
        grid-template-columns: repeat(7,150px) 1fr;
        grid-template-rows: min-content;
        background-color: rgba(0, 0, 0, 0.8);
        grid-gap: 10px;
        padding: 10px;
        align-self: start;


    }
    .navbar a,h2{
        text-decoration: none;
        padding: 5px;
        display: block;
        text-align: center;
        color: white;
    }
    #sign_btn{
        justify-self: end;
        align-self: center;
    }
    #sign-btn button{
        display: block;
        padding: 5px;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
    }

    .signIn{
        width: 250px;
	box-sizing: border-box;
	background-color:rgba(0, 0, 0,0.5);
	box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); 
    position: absolute;
    right: 10%;
    top: 10%;
    display: none;
    z-index: 1;
    border-radius: 16px;

    border: solid 1px gray;
}
.signIn form{
    display: grid;
    grid-template-columns: 100%;
    padding: 30px;
    grid-template-rows: repeat(auto-fit,min-content);
    grid-gap: 30px;
    color: white;
	
}
.btn-login{
	padding: 15px 25px;
	border: none;
	background-color: #27ae60;
	color: #fff;
}
.signIn form input{
    width: 100%;
    padding: 4px;
    border-radius: 4px;
}

.btn{
	height: 40px;
	width: 50%;
	background-color: rgb(0, 0,0,0.5);
	color: white;
	font-size: 20px;
	border-radius: 15px;
	padding: 8px;
	border: none;
}

        .availability{
            position: absolute;
            top: 50%;
            left: 15%;
            width: 70%;
            
        }
        .availability form{
            display: grid;
            grid-template-columns: repeat(5,1fr);
            padding: 30px;
            grid-gap: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2) inset, -2px -2px 16px rgba(0, 0, 0, 0.2);
            color: white;


        }
        .availability span{
            display: block;
            margin-bottom: 5px 0;
        
        }
        .availability input{
            display: block;
            width: 100%;
            margin-top: 10px;
            height: 30px;
        }
        .guest{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            grid-template-rows: max-content;
            padding: 2px;
            grid-row-gap: 3px;
        }
        .check-btn{
            align-self: end;
        }
        .check-btn button{
            width: 100%;
            padding: 8px;
          
        }
        .roomcontent{
            display: grid;   
     grid-template-columns: 70%;
     grid-template-rows: repeat(auto-fit, min-content);
     grid-gap: 10px;
     justify-content: center;
        }
        .registration{
            display: none;
        }
        #submit_details{
            width: 50%;
            display: grid;
            grid-template-columns: repeat(2,1fr);
            grid-template-rows: min-content;
            grid-gap: 10px;
            padding: 20px;
            background-color: cyan;
            justify-self: center;
            position: absolute;
            top: 5%;
            left: 20%;
        }
        .customer{
            display: grid;
            grid-template-columns: 100%;
            grid-template-rows: repeat(auto-fit,min-content);
            padding: 10px;
            grid-gap: 10px;

        }
        .customer span{
            display: block;
        }
        .customer input,select{
            width: 100%;
            height: 30px;
        }
.message{
    position: absolute;
    z-index: 1;
}
  
</style>