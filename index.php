<?php
function photo_size($max,$interval) {
    for ($i = $interval; $i <= $max; $i++) {
        if (($i % $interval+1) == 1) {
            print "<option value=$i>$i</option>";
        }        
    }
}       
?>
<div id="container">
    <form action="download.php" method="get">
    <h3>
        <label>Choose Photo Sizes
            <select name="w">
                <?php photo_size(1000,10); ?>
            </select>
        </label>
 
        <label> x 
            <select name="h">
                <?php photo_size(1000, 10); ?>
            </select>
        </label>
    </h3>

    <h3>Choose Images from below to Select</h3>

    <input type="submit" value="Download">

    <hr>
        <?php
        $all_images = scandir("images");
        array_splice($all_images, 0, 2);

        foreach ($all_images as $image) {
            print "
                <div class='img-box'>
                    <label>
                        <input type='checkbox' name='image[]' value ='$image'><img src='images/$image'>
                    </label>
                </div>
            ";                    
        }


        ?>
    </form>
</div>

<style>
#container{
    width: 1145px;
    margin: auto;
    /* border: 1px solid black; */
}
form{
    text-align: center;
}
.img-box{
    width: 114px;
    height: 90px;
    float: left;
    /* border: 1px solid black; */
}
img{
    width: 100px;
    height: 80px;
    margin: 5px;
}
input[type=checkbox]{ 
    display: none;
}
label{
    cursor: pointer;
}
input[type=checkbox]:checked+img{     
    border: 2px solid red;
    opacity: 0.3;
}

input[type=checkbox]:checked .centered{     
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 20px;
}
</style>
