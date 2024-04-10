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

      .container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        padding: 10rem 1rem 10rem 1rem;
      }

      .size {
        min-width: 200px;
        text-align: center;
        margin: 0 auto;
        margin-bottom: 2rem;
        border: 1px solid #d2b48c;
        background-color: #FFFFF0;
        box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
      }

      .title {
        text-align: center;
        font-size: 1.5rem;
        border-bottom: 1px solid #d2b48c;
      }

      .description {
        font-size: 1rem;
        color: red;
      }

      h1 {
        font-size: 1rem;
        font-family: Georgia, 'Times New Roman', Times, serif;
      }

      h1, p, h2 {
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

      img {
        width: 90%;
      }

      hr {
        display: none;
      }


      @media screen and (min-width: 1400px) {



      }
    </style>
</head>
<body>
    
<?php foreach($stories->channel->item as $item) : ?>
  <div class="container">
    <div class="size" >
      <h2 class="title" ><?php echo $item->title . "<br>"; ?></h2>
      <hr>
      <p class="description"><?php echo $item->description . "<br>"; ?></p>
      <p class="publishdate" ><?php echo $item->pubdate . "<br>"; ?></p>
    </div>
  </div>  
  <?php endforeach ?>
</body>
</html>

