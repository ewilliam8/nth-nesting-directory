<div id="add_chapter"
     class="modal fade"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить раздел</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="insert.php">
                    <div class="mb-3">
                        <label class="form-label">Название раздела</label>
                        <input type="text" name="add_chapter" class="form-control" required="required">
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
                        for ($i = 0; $i < count($list); $i++) {
                            echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
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

<div id="change_chapter"
     class="modal fade"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Изменить раздел</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="insert.php">
                    <select name="id" class="form-select mb-3" required="required">
                        <option value="-1" selected>Выберите раздел</option>
                        <?
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('chapter');
                        for ($i = 0; $i < count($list); $i++) {
                            echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
                        }
                        ?>
                    </select>
                    <div class="mb-3">
                        <label class="form-label">Изменить название раздела на:</label>
                        <input type="text" name="change_chapter" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Изменить описание раздела на:</label>
                        <input type="text" name="desc" class="form-control">
                    </div>
                    <select name="parent_id" class="form-select mb-3">
                        <option value="-1" selected>Переместить раздел</option>
                        <?php
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('chapter');
                        for ($i = 0; $i < count($list); $i++) {
                            echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
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

<div id="add_elem"
     class="modal fade"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить элемент</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="insert.php">
                    <div class="mb-3">
                        <label class="form-label">Название элемента</label>
                        <input type="text" name="add_elem" class="form-control" required="required">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <input type="text" name="desc" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Тип</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <select name="parent_id" class="form-select mb-3">
                        <option value="-1" selected>Выбрать родительский элемент</option>
                        <?php
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('chapter');
                        for ($i = 0; $i < count($list); $i++) {
                            echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
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

<div id="change_elem"
     class="modal fade"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменить элемент</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="insert.php">
                    <select name="id" class="form-select mb-3" required="required">
                        <option value="-1" selected>Выберите элемент</option>
                        <?php
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('elem');
                        for ($i = 0; $i < count($list); $i++) {
                            if ($list[$i]["parent_id"] != -1) {
                                echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="mb-3">
                        <label class="form-label">Изменить название элемента на:</label>
                        <input type="text" name="change_elem" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Изменить описание элемента на:</label>
                        <input type="text" name="desc" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Изменить тип элемента на:</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <select name="parent_id" class="form-select mb-3">
                        <option value="-1" selected>Переместить элемент</option>
                        <?php
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('chapter');
                        for ($i = 0; $i < count($list); $i++) {
                            echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
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

<div id="delete_chapter"
     class="modal fade"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удалить раздел</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="insert.php">
                    <select name="delete_chapter" class="form-select mb-3">
                        <option value="-1" selected>Выбрать раздел</option>
                        <?php
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('chapter');
                        for ($i = 0; $i < count($list); $i++) {
                            echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
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

<div id="delete_elem"
     class="modal fade"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удалить элемент</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="insert.php">
                    <select name="delete_elem" class="form-select mb-3">
                        <option value="-1" selected>Выбрать раздел</option>
                        <?php
                        $db = new Database();
                        $db->connect();

                        $list = $db->select('elem');
                        for ($i = 0; $i < count($list); $i++) {
                            if ($list[$i]["parent_id"] != -1) {
                                echo '<option value="' . $list[$i]["id"] . '">' . $list[$i]["title"] . '</option>';
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
