<?php
  // Could have used a database here and in real life that is absolutely how I would 
  // approach it but setting up a database with remote access when a 3 entry 
  // associative array would do seemed like overkill :)
  $products = [  
    "1" => [
        "title" => "The Smooth Operator",
        "price" => 84.99,
        "category" => "Formal",
        "tagline" => "Great for Work... Even Better for After Work Drinks",
        "image" => "img/smooth-operator-product.jpg",
        "description" => "The perfect addition to your work wardrobe, that you'll also be happy to wear on the weekend. Dress shoes can be hard to buy. They're expensive. And you don't really know if you like them until you've gotten your first blister and decide that you hate them. You will not hate these shoes. The cushioning inside makes it feel like you're walking on clouds. The high ankle means that there is no rubbing, ever. You will not get a blister with these shoes. Also, they've got style. They're classic with a little something. They're not your father's boring shoes, but they're not so eccentric that your boss rolls his eyes. We call them \"hipster-lite\". Your girlfriend loves to show them off and brag to her friends about your sense of style and your mom thinks you just look so handsome. Hey, this might be the first thing they've ever agreed on. These shoes are definitely a win-win.",
     ],
    
    "2" => [
        "title" => "The Dakota",
        "price" => 64.99,
        "category" => "Boot",
        "tagline" => "The shoe you can take just about anywhere!",
        "image" => "img/the-dakota.jpg",
        "description" => "From movie night with the girls to a meeting with your boss, this shoe does it all. The Dakota can easily be dressed up or down, and has enough support to wear all day. Hello, new favourite!",
     ],
    
    "3" => [
        "title" => "The Navy All-Day",
        "price" => 44.99,
        "category" => "Casual",
        "tagline" => "The perfect shoe for the weekend",
        "image" => "img/navy-all-day.jpg",
        "description" => "A thick, cushion-y bottom and a soft, flexible top. The Navy All-Day is a shoe that you can live in. This shoe will be your companion through thick and thin.",
     ],   
  ];
?>