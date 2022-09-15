<?php foreach($categoryList as $category): ?>
    <div>
        <h2>
            <a href="<?=route('news.index',['categoryId' => $category['categoryId'] +1])?>">
                <?= $category['category'] ?>
            </a>
        </h2>
    </div>
    
<?php endforeach ?>