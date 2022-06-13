<?php

function getTree($data)
{
    $tree = [];
    foreach ($data as $id => &$node) {
        if (!$node['parent_id'])
            $tree[$id] = &$node;
        else
            $data[$node['parent_id']]['childs'][$node['id']] = &$node;
    }
    return $tree;
}