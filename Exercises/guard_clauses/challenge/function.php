<?php

function validatePost($PostObj = null) {
    if (!is_null($PostObj)) {
        if (isset($PostObj->Id)) {
            if (is_numeric($PostObj->Id)) {
                if (isset($PostObj->Title)) {
                    if (strlen($PostObj->Title)) {
                        if (strlen($PostObj->Content) > 50) {
                            if (strlen($PostObj->Content) > 50) {
                                if (isset($PostObj->ImagePath)) {
                                    if (file_exists($PostObj->ImagePath)) {
                                        if (isset($PostObj->Date)) {
                                            if ($PostObj->Date instanceof DateTime && $PostObj->Date < new DateTime()) {
                                                if (isset($PostObj->Comments)) {
                                                    if (is_array($PostObj->Comments)) {
                                                        if (count($PostObj->Comments)) {
                                                            if (array_reduce($PostObj->Comments, function ($KeyInt, $ValueStr) {
                                                                return !is_string($ValueStr);
                                                            }, true)) {
                                                                return array("valid" => false, "message" => "Comments needs to be an array of strings");
                                                            }
                                                        }
                                                        return array("valid" => true, "message" => "All seems good!");
                                                    } else {
                                                        return array("valid" => false, "message" => "Comments needs to be an array");
                                                    }
                                                } else {
                                                    return array("valid" => false, "message" => "Comments needs to be set");
                                                }
                                            } else {
                                                return array("valid" => false, "message" => "Date must be a date in the past");
                                            }
                                        } else {
                                            return array("valid" => false, "message" => "Date is required");
                                        }
                                    } else {
                                        return array("valid" => false, "message" => "Image does not exist");
                                    }
                                } else {
                                    return array("valid" => false, "message" => "Image is required");
                                }
                            } else {
                                return array("valid" => false, "message" => "Content too short");
                            }
                        } else {
                            return array("valid" => false, "message" => "Content is required");
                        }
                    } else {
                        return array("valid" => false, "message" => "Title too short");
                    }
                } else {
                    return array("valid" => false, "message" => "Title is required");
                }
            } else {
                return array("valid" => false, "message" => "Id must be numeric");
            }
        } else {
            return array("valid" => false, "message" => "Id is required");
        }
    } else {
        return array("valid" => false, "message" => "Post is null");
    }
}
