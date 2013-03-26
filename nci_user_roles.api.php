<?php

/**
 * Use the provided array to add roles and update permissions to assign to each.
 * 
 * @return array An array of roles and permissions to be added to the existing
 *               definitions.
 */
function hook_role_permissions() {
    $new_perms = array();
    $new_perms['role_name']['permission name'] = true;
    $new_perms['second_role_name'] += array(
        'permission one' => true,
        'permission two' => true,
    );
    
    return $new_perms;
}

/**
 * Hook to retrieve all implementing modules' definitions of role permission
 * inheritance.
 * 
 * @return array An array in the form $role => $inherited_perms, where each role
 *               is mapped to an array of other roles whose permissions will
 *               be aggregated and added to the base permissions for the role.
 *               Each array should be the complete mapping for the module's
 *               roles, (and in order of least to greatest access) as the 
 *               permission assignment is done in a single pass without 
 *               iteration.
 */
function hook_role_inheritance() {
    return array(
        'authenticated user' => array('anonymous user'),
        'administrator' => array('anonymous user', 'authenticated user'),
    );
}

?>
