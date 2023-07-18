<?php
  $rssUrl = "https://www.radiofrance.fr/francemusique/rss";

  $rss = simplexml_load_file($rssUrl);

  if ($rss) {
    $items = $rss->channel->item;
    $tickerContent = '';

    foreach ($items as $item) {
      $title = $item->title;
      $link = $item->link;

      $tickerContent .= '<a href="' . $link . '">' . $title . '</a> | ';
    }

    echo '<div class="ticker-container">';
    echo '<marquee behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">';
    echo $tickerContent;
    echo '</marquee>';
    echo '</div>';
  } else {
    echo 'Erreur lors de la récupération du flux RSS';
  }
  ?>