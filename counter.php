<?php
         function resetCounter( &$c )
         {
             $c = 0;
         }
         $counter = 0;
         $counter++;
         $counter++;
         $counter++;
         echo "$counter</br>";
         resetCounter( $counter );
         echo "$counter<br/>";
     ?>