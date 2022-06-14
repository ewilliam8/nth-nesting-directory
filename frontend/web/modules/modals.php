<div id="addChapter"
     class="modal fade"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить раздел</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="insert.php">
                    <div class="mb-3">
                        <label class="form-label">Название раздела</label>
                        <input type="text" name="addChapter" class="form-control" required="required">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <input type="text" name="desc" class="form-control">
                    </div>
                    <select name="parent_id" class="form-select mb-3" aria-label="Default select example">
                        <option value="-1" selected>Выбрать родительский элемент</option>
                        <?php
                            $db = new Database();
                            $db->connect();

                            $list = $db->select('chapter');
                            for($i = 0; $i < count($list); $i++) {
                                echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div id="changeChapter"
     class="modal fade"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменить раздел</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="insert.php">
                    <select name="id" class="form-select mb-3" aria-label="Default select example" required="required">
                        <option value="-1" selected>Выберите раздел</option>
                        <?
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('chapter');
                        for($i = 0; $i < count($list); $i++) {
                            echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                        }
                        ?>
                    </select>
                    <div class="mb-3">
                        <label class="form-label">Изменить название раздела на:</label>
                        <input type="text" name="changeChapter" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Изменить описание раздела на:</label>
                        <input type="text" name="desc" class="form-control">
                    </div>
                    <select name="parent_id" class="form-select mb-3" aria-label="Default select example">
                        <option value="-1" selected>Переместить раздел</option>
                        <?php
                            $db = new Database();
                            $db->connect();

                            $list = $db->select('chapter');
                            for($i = 0; $i < count($list); $i++) {
                                echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div id="addElem"
     class="modal fade"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить элемент</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="insert.php">
                    <div class="mb-3">
                        <label class="form-label">Название элемента</label>
                        <input type="text" name="addElem" class="form-control" required="required">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <input type="text" name="desc" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Тип</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <select name="parent_id" class="form-select mb-3" aria-label="Default select example">
                        <option value="-1" selected>Выбрать родительский элемент</option>
                        <?php
                            $db = new Database();
                            $db->connect();

                            $list = $db->select('chapter');
                            for($i = 0; $i < count($list); $i++) {
                                echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div id="changeElem"
     class="modal fade"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменить элемент</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="insert.php">
                    <select name="id" class="form-select mb-3" aria-label="Default select example" required="required">
                        <option value="-1" selected>Выберите элемент</option>
                        <?php
                            $db = new Database();
                            $db->connect();

                            $list = $db->select('elem');
                            for($i = 0; $i < count($list); $i++) {
                                if($list[$i]["parent_id"] != -1) {
                                    echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <div class="mb-3">
                        <label class="form-label">Изменить название элемента на:</label>
                        <input type="text" name="changeElem" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Изменить описание элемента на:</label>
                        <input type="text" name="desc" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Изменить тип элемента на:</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <select name="parent_id" class="form-select mb-3" aria-label="Default select example">
                        <option value="-1" selected>Переместить элемент</option>
                        <?php
                            $db = new Database();
                            $db->connect();

                            $list = $db->select('chapter');
                            for($i = 0; $i < count($list); $i++) {
                                echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="deleteChapter"
     class="modal fade"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удалить раздел</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="insert.php">
                    <select name="deleteChapter" class="form-select mb-3" aria-label="Default select example">
                        <option value="-1" selected>Выбрать раздел</option>
                        <?php
                            $db = new Database();
                            $db->connect();

                            $list = $db->select('chapter');
                            for($i = 0; $i < count($list); $i++) {
                                echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="deleteElem"
     class="modal fade"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удалить элемент</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="insert.php">
                    <select name="deleteElem" class="form-select mb-3" aria-label="Default select example">
                        <option value="-1" selected>Выбрать раздел</option>
                        <?php
                            $db = new Database();
                            $db->connect();

                            $list = $db->select('elem');
                            for($i = 0; $i < count($list); $i++) {
                                if($list[$i]["parent_id"] != -1) {
                                    echo '<option value="'.$list[$i]["id"].'">'.$list[$i]["title"].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
