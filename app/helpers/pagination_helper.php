<?php

    function calculateTotalPages($itemCount = 1){
        $resperpage = RESULTS_PER_PAGE;

        $total = floor(($itemCount / $resperpage) + 1); //Could also do ceil 

        return $total;


    }

    function definePageInterval($actualPage, $totalPages){

        $limits = [];
        //5 pages will be shown at page controls at all
        $npagesshown = PAGES_SHOWN;


        if($totalPages <= $npagesshown){
            //Simplest case, we got less than 5 pages
            $limits['limsup'] = $totalPages;
            $limits['liminf'] = 1;


        }elseif($actualPage <= ceil($npagesshown/2)){
            //Page at beginning
            //Must be less or eq than the middle of the desired pages
            
            $limits['limsup'] = $npagesshown;
            $limits['liminf'] = 1;


        }elseif($actualPage >= ($totalPages - ceil($npagesshown/2))){
            //Page at end
            $limits['limsup'] = $totalPages;
            $limits['liminf'] = $totalPages - $npagesshown;


        }else{

            //Normal case, page at middle
            $limits['limsup'] = $actualPage + ceil($npagesshown/2);
            $limits['liminf'] = $actualPage - ceil($npagesshown/2);

        }


        return $limits;


    }



?>