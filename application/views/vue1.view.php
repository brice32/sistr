<div>
    <h2>Vue 1</h2>
    <p><?php echo __FILE__; ?></p>
    <p><?php echo $this->titre; ?></p>
    <ul>
        <?php
        $data=$this->utilisateurs;
        foreach($data as $U):
            ?>
            <li><?php echo $U['nom'].' '.$U['prenom'];?></li>
            <?php
        endforeach;
        ?>
    </ul>
</div>

