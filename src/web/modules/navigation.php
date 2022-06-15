<div id="navigation">
    <h1>Navigation</h1>
    <div id="nav-list">
        <?php
        $db_chap = new Database();
        $db_chap->connect();

        $db_elem = new Database();
        $db_elem->connect();

        if (!isset($_POST['sort_az'])) {
            $res_chap = $db_chap->select('chapter');
        } elseif (!isset($_POST['sort_time'])) {
            $res_chap = $db_chap->select('chapter', '*', null, 'updated_at');
        } else {
            $res_chap = $db_chap->select('chapter', '*', null, 'title');
        }
        $res_elem = $db_elem->select('elem');

        function create_tree($sec, $elem, $parent_id)
        {

            if ($parent_id != null)
                $tree = '<ul class="list-group ml-3">';

            for ($i = 0; $i < count($sec); $i++) {
                if ($sec[$i]["parent_id"] == null) {
                    $tree .= '<li class="list-group-item">' . $sec[$i]['title'];

                    for ($k = 0; $k < count($elem); $k++) {
                        if ($elem[$k]["parent_id"] == $sec[$i]["id"]) {
                            $tree .= "<ul class='list-group-item ml-3'>" . $elem[$k]["title"] . "</ul>";
                        }
                    }
                    $tree .= '</li>';
                } elseif ($sec[$i]["parent_id"] == $parent_id) {
                    $tree .= '<li class="list-group-item">' . $sec[$i]['title'] . '</li>';
                    $tree .= create_tree($sec, $elem, $sec[$i]['id']);

                    for ($k = 0; $k < count($elem); $k++) {
                        if ($elem[$k]["parent_id"] == $sec[$i]["id"]) {
                            $tree .= "<ul class='list-group-item ml-3'>" . $elem[$k]["title"] . "</ul>";
                        }
                    }
                }
            }
            $tree .= '</ul>';

            return $tree;
        }

        echo create_tree($res_chap, $res_elem, -1);
        ?>
    </div>
</div>