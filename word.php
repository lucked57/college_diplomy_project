<?php
 $doc_body ="
    <table>
<tr>
  <th> № </th>
  <th>Заголовок</th>
  <th>Описание</th>
  <th>Check</th>
  <th>Группа</th>
  </tr>
 <tr>
  <td>1</td>
  <td>Название достижения</td>
  <td>Описание достижения тут будет много текста очень много текста очень много текста очень много текста очень много текста очень много текста очень много текста очень много текста очень много текста очень много текста очень много текста очень много текста</td>
  <td>ДА</td>
  <td>-</td>
 </tr>
</table>
 ";
mb_convert_encoding($doc_body, "UTF-8");
 /*$doc_body ="
 <h1>PHP - Export Content to MS Word document</h1>
 <p>This is a test.<p>
 <p>This is a test.<p>
 ";*/



  if(isset($_POST['submit_docs'])){
          header("Content-Type: application/vnd.msword");
          header("Expires: 0");//no-cache
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
          header("content-disposition: attachment;filename=infoaboutusers.doc");
  }          
          echo "<html lang='ru'>";
          echo "<head>
        <meta charset='UTF-8'>";   
          echo "$doc_body";
          echo "</head>";
          echo "</html>";       
?> 

 <form name="proposal_form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
  <input type="submit" name="submit_docs" value="Export as MS Word" class="input-button" />
</form>



