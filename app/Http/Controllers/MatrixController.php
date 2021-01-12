<?php

declare(strict_types=1);

namespace App\Http\Controllers;


class MatrixController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /*** Declare a function to calculate Matrix Multiplication ***/
    public function matrixMultiplication( )
    {

        // Initialize matrix a
        $a = array(  
             array(1, 3, 2),  
             array(3, 1, 1),  
             array(1, 2, 2)  
          );  
          
          // Initialize matrix b
        $b = array(  
             array(2, 1, 1),  
             array(1, 0, 1),  
             array(1, 3, 1)  
         );  

         //Calculates number of rows and columns present in first matrix  
         $row1 = count($a);// 3 
         $col1 = count($a[0]); // 3  
         
         //Calculates number of rows and columns present in second matrix  
         $row2 = count($b);  
         $col2 = count($b[0]);  


         //For two matrices to be multiplied,   
         //number of columns in first matrix must be equal to number of rows in second matrix 
         if ($col1 != $row2) {  
            return response()->json([
                   'error' => "Matrices cannot be multiplied",422,
            ]);
         } else { 
          
            //Array prod will hold the result and initialize it with 0  
            $prod = array_fill(0, $col2, array_fill(0, $row1, 0));  

              
            //Performs product of matrices a and b. Store the result in matrix prod  
            for ($i = 0; $i < $row1; $i++) {  
                for ($j = 0; $j < $col2; $j++) {  
                    for ($k = 0; $k < $row2; $k++) {  
                       $prod[$i][$j] = $prod[$i][$j] + $a[$i][$k] * $b[$k][$j];   
                    }  
                }  
            }  
              
            print("Product of two matrices: <br>");  
            for ($i = 0; $i < $row1; $i++) {  
                for ($j = 0; $j < $col2; $j++) { 
                    
                  $charcter = chr($prod[$i][$j]+65);
                  print($charcter . " ");  
                }  
                print("<br>");  
        
        }
         }

    }  
}
