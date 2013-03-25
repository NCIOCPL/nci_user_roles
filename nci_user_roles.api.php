<?php

/**
 * Use the provided array to add roles and update permissions to assign to each.
 * 
 * @param array $role_perm_map Array of the format role_name => permission name
 *                               => TRUE for each role and permission to
 *                               enable, all roles not enabled will be cleared.
 *                               (Provided for reference and to use existing
 *                                sets of permissions as a base for new roles.)   
 * @return array An array of roles and permissions to be added to the existing
 *               definitions.
 */
function hook_user_roles_alter(array $role_perm_map) {
    $new_perms = array();
    $new_perms['role_name']['permission name'] = true;
    $new_perms['second_role_name'] += array(
        'permission one' => true,
        'permission two' => true,
    );
    
    return $new_perms;
}

?>
