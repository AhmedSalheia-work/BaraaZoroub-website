<footer class="main-footer w-100  " >
    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center align-content-center ">
            <div class="col-12 col-md-6 ">
                <div class="  copy   text-white pt-5 pt-md-2 d-flex justify-content-center justify-content-md-start  "><?= $copy ?></div>
            </div>
            <div class="col-12  col-md-6  d-flex justify-content-center justify-content-md-end text-white py-3">
                <span class="px-1"><?= $dev ?></span>
                <a href="https://prography.co" class="text-white">
                    Prography Co.
                </a>
            </div>

        </div>
    </div>
</footer>

<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Person",
  "name" : "BaraaZoroub",
 "url" : "https://www.baraazoroub.com",
 "sameAs" : [
     <?php
        $str = '';
        foreach ($social as $item){
            if ($item->id == 'facebook' || $item->id == 'twitter' || $item->id == 'instagram' || $item->id == 'linkedin')
            {
                $str .= "\"".$item->link."\",\n\t";
            }
        }
        
        echo trim($str,",\n\t");
     ?>
     ]
}
</script>