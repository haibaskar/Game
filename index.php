<html>
<style>
	.maindiv{
	   margin-top: 50px;
       margin-left: 40%;
       width: 400px;
       color: white;
       height: 500px;
       background-color: black;
    }
    .childiv
    {
    	padding-top: 20px;
    	margin-left: 20px;
    }
</style>
<body>
<?php 
session_start();
error_reporting(0);
        $dice_1='';
        $dice_2='';
        
        //$_SESSION['balance']=100;
       if($_REQUEST['r']==1)
        {
           $_SESSION['balance']=100;
        }

        $_SESSION['check']=0;
        $sum=0;
        $result=0;
        if(isset($_REQUEST['submit'])){


        
        if($_REQUEST['check']==0)
        {
           $_SESSION['balance']=100;
        }

           $_SESSION['check']=$_SESSION['check']++;
           $_SESSION['balance']=$_SESSION['balance']-10;
           $option=$_REQUEST['option'];

           $dice_1=rand('0','6');
           $dice_2=rand('0','6');

           $sum=$dice_1+$dice_2;
           $result=0;
           
           if($sum<7 && $option==6)
           {
           	  $result=1;
           	  $_SESSION['balance']=$_SESSION['balance']+20;
           }

           if($sum>7 && $option==8)
           {
           	  $result=1;
           	  $_SESSION['balance']=$_SESSION['balance']+20;
           }

           if($sum==7 && $option==7)
           {
           	  $result=1;
           	  $_SESSION['balance']=$_SESSION['balance']+30;
           }


      }
    ?>

<div class="maindiv">

	<div class="childiv">
    <h3>Welcome to lucky 7 game</h3>
 
    <p>Place your bet (Rs.10)</p>

    <form method="post">
    	<input type="hidden" name="check"  value="<?php $_SESSION['check']; ?>">
        <input type="radio" name="option"  value="6"> Below 7
        <input type="radio" name="option"  value="7" >7 
        <input type="radio" name="option"  value="8" > Above 7
        <input type="submit" name="submit" value="Play">
    </form>

    </div>



    <?php if($sum>0) { ?>
     <div>
     	<h3>Game Result</h3>
     	<p>Dice 1: <?php echo $dice_1; ?> </p>
     	<p>Dice 2: <?php echo $dice_2; ?></p>
     	<p>Total : <?php echo $sum; ?></p>
     	<?php 

     	if($result==1){ 
     		echo "<p>congratulations1. You win! your balance is now ".$_SESSION['balance']."</p>"; 
        }else{ 
        	echo "<p>You lose! your balance is now ".$_SESSION['balance']."</p>"; 
        }

     	?>
       <a href="index.php?r=1"><input type="button" name="option"  value="Reset" > </a>
        <a href="index.php"><input type="button" name="option"  value="Continue" > </a>
     </div>
    <?php } ?>


</div>



</body>
</html>
