<table class="table table-striped table-">

<thead>
    <th>Titre</th>
    <th>Created by</th>
</thead>

  <tbody>
  <?php foreach ($topicList as $topic): ?>
    <tr>
    <td><a href=<?=getLinkToRoute("show-topic",["id"=>$topic->getId()])?> ><?php echo $topic->getTitle()?></a></td>
    <td><?php echo $topic->getUser()->getUsername()?></td>
    <td>
      <?php echo $topic->getId()?>
      
    </td>
   <td></td>
    <?php endforeach;?>
     </tr>
  </tbody>
  <a href=<?=getLinkToRoute("create-post")?> >Create new post</a>

</table>


