<?php 

// Define the URL of the RSS feed
$file_url = "http://www.buzzfeed.com/politics.xml";

$content = file_get_contents($file_url);
if (!$content) {
    echo "No Çontent";
    exit;
}

$stories = simplexml_load_string($content);
if(!$stories) {
    echo "Something is wrong with the news story";
    exit;
}
?>
<!-- // print_r($stories); -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzzfeed News Articles</title>
    <style>
      body {
        background-color: #d2b48c;
      }

      /* container edits: grid, colors, sizing etc. */
      .container {
        display: grid;
        width: 80%;
        gap: 1rem;
        grid-template-columns: repeat(auto-fit, minmax(315px,1fr));
        grid-template-rows: auto;
        justify-content: center;
        padding: 10rem 1rem 10rem 1rem;
        margin: 0 auto;
      }

      .size {
        display: flex;
        flex-direction: column;
        justify-content: center;

        min-width: 300px;
        text-align: center;
        margin: 0 auto;
        margin-bottom: 2rem;
        border: 1px solid #d2b48c;
        background-color: #FFFFF0;
        box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
      }

      /* individual elements within containers */
      .title {
        text-align: center;
        font-size: 1.5rem;
        border-bottom: 1px solid #d2b48c;
      }

      .description {
        font-size: 1rem;
        color: red;
      }

      img {
        width: 90%;
      }

      hr {
        display: none;
      }

      /* Fonts */

      .thetitle {
        color: white;
        border-bottom: 1px solid white;
        font-size: 2rem;
      }

      .theintro {
        color: white;
        font-size: 1rem;
        font-weight: normal;
        margin-bottom: -80px;
      }

      h1 {
        font-size: 1rem;
        font-family: Georgia, 'Times New Roman', Times, serif;
      }

      h1, h2, h3 {
        width: 80%;
        text-align: center;
        margin: 0 auto;
        padding: 1rem;
      }


      a {
        width: 200px;
        text-decoration: none;
        color: white;
        font-size: 1.5rem;
        background-color: #d2b48c;
        padding: 1rem;
        border-radius: 20px;
        box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
      }

      

      @media screen and (min-width: 1279px) {
        .container {
          grid-template-columns: repeat(auto-fit, minmax(315px,1fr));
          gap: 2rem;
        }



      .size:nth-child(5n+1) {
        width: auto;
        grid-column: span 2;
      }

      }

      @media screen and (min-width: 1950px) {
        .container {
          grid-template-columns: repeat(auto-fit, minmax(315px,1fr));
        }

        .size:nth-child(5n+1) {
          width: auto;
          grid-column: span 3;
      }

       .size:nth-child(5n+5) {
          width: auto;
          grid-column: span 2;
      }

    }

    @media screen and (min-width: 2143px) {

      .size:nth-child(5n+4) {
          width: auto;
          grid-column: span 3;
      }
  


    }

    </style>
</head>
<body>
  <section>
    <h1 class="thetitle" >Buzzfeed News:</h1>
    <h3 class="theintro">"Welcome to Buzzfeed News, where we bring you the latest updates, deep dives, and engaging stories from around the world. From breaking news to thought-provoking features, our team of dedicated journalists is committed to delivering accurate, insightful, and impactful reporting on the issues that matter most. Whether it's politics, culture, technology, or beyond, we're here to inform, entertain, and spark meaningful conversations. Dive in and join us on the journey of discovery and understanding.</h3>
    <div class="container">
    <?php foreach($stories->channel->item as $item) : ?>
      <div class="size" >
        <h2 class="title" ><?php echo $item->title . "<br>"; ?></h2>
        <hr>
        <h2 class="description"><?php echo $item->description . "<br>"; ?></h2>
        <h2 class="publishdate" ><?php echo $item->pubdate . "<br>"; ?></h2>
      </div>
      <?php endforeach ?>
    </div>  
  </section>

</body>
</html>

