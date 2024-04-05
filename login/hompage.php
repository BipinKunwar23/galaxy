<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">




 <title>Homepage</title>
 </head>
 <body>
     <style>
         *{
             margin: 0;
             padding: 0;
             box-sizing: border-box;
             font-family: 'Poppins', sans-serif;
         }
  .main-nav{
    width: 100%;
    height: 100px;
    display: grid;
    background-color: skyblue;

}
.logo{
   
    padding-top: 15px;
    grid-column: 1/3;
    justify-content: center;
    align-items: center;

} 
.logo h2 span{
    padding-left: 20px;
    padding-right: 5px;
    text-decoration: aliceblue;
}
.menu-link{
    grid-column: 3/4;
    
} 
.menu-link ul{
    
    height: 50px;
display: flex;
justify-content: center;
align-items: center;
list-style: none;


}
.menu-link ul li{
 
    padding: 50px 80px 40px 30px;
}
.menu-link ul li a{
    text-decoration: none;
}

.social-media{
    grid-column: 5/6;
}
.social-media ul{
    list-style: none;
    display: flex;
    padding-right: 50px;
    align-items: right;
    grid-template-columns: 3fr repeat(3, 1fr);
    

}
     

.social-media ul li{
    text-align: right;
    
    grid-column: 5/6;
    padding-right: 20px;
    font-size: 50px;
    
}
     </style>
<nav class="main-nav">
                        
<div class="logo">
 <h2>
 <span>A-</span>nnapurna
<span>H-</span>otel
</h2>
          
 </div>
                       
<div class="menu-link">
 <ul>
 <li><a href="">Home</a></li>
<li><a href="">About</a></li>
<li><a href="">Services</a></li>
<li><a href="">Contact</a></li>
          
</ul>
          
</div>

                       
<div class="social-media">
                        
<ul class="social-media-desktop">
               <li>
               <a href=""><i class="fa-brands fa-facebook-square"></i></a> 
               </li>
               <li>
                   <a href=""><i class="fa-brands fa-instagram-square"></i></a>
               </li>     
                          </ul>
          
                        </div>
                      </nav>
                </body>
                </html>
     
            
       