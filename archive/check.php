<table>
    <caption>Archive Files</caption>
      <thead>
        <th>Name</th>
      </thead>
      <tbody>
      <?php if ($_COOKIE["FM_user"]!=="root"): ?>
        <?php $path="../../".$_COOKIE["FM_user"]."/data/archive/" ;?>
        <?php else: ?>
          <?php $path="../../Control/data/archive/" ; ?>
      <?php endif ?>

      <?php $D=scandir($path);
      $D=array_splice($D,2);
       ?>
        <?php foreach ($D as $key => $value): ?>
          <?php if (file_exists($path.$value)==true): ?>
            <tr class="lime accent-2"><td><a href="<?php echo $path.$value ?>"><?php echo $value ?></a></td></tr>
          <?php endif ?>
          
        <?php endforeach ?>
      </tbody>
</table>
