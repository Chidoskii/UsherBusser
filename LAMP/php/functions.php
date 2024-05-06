<?php
/*-----------------------------------------------LOG IN-----------------------------------------------*/

function get_user($email) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Users  WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    
    return $results[0];

}

/*-----------------------------------------------USER-----------------------------------------------*/
function getUserId($email) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT userID FROM Users  WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);


    return $results[0]['userID'];

}

function getUserShifts($id, $past) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Shifts  WHERE u_ID = ? and startTime > ?");
    $query->bind_param("is", $id, $past);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    
    return $results;

}

function getPayrollShifts($id, $past, $present) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Shifts  WHERE u_ID = ? and startTime > ? and startTime <= ?");
    $query->bind_param("iss", $id, $past, $present);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    
    return $results;

}

function getWatchlistId($id) {
    $lt = "watch";
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Lists  WHERE u_ID = ? and ltype = ?");
    $query->bind_param("is", $id, $lt);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    
    return $results[0]['listID'];

}

function onWatchlist($id, $mid) {
    $outcome = false;
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM List_Items  WHERE lID = ? and mID = ?");
    $query->bind_param("ii", $id, $mid);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    if (count($results) > 0) {
        $outcome = true;
    }

    return $outcome;
}

function getSeenlistId($id) {
    $lt = "seen";
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Lists  WHERE u_ID = ? and ltype = ?");
    $query->bind_param("is", $id, $lt);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    return $results[0]['listID'];

}

function onSeenlist($id, $mid) {
    $outcome = false;
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM List_Items  WHERE lID = ? and mID = ?");
    $query->bind_param("ii", $id, $mid);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    if (count($results) > 0) {
        $outcome = true;
    }

    return $outcome;
}

function getReviewContent($id, $mid) {
    $msg = "empty";
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Reviews  WHERE u_ID = ? and mID = ?");
    $query->bind_param("ii", $id, $mid);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);
    
    if (count($results) > 0) {
        $msg = $results[0]['critique'];
    }
    return $msg;
}

function isReviewed($id, $mid) {
    $outcome = false;
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Reviews  WHERE u_ID = ? and mID = ?");
    $query->bind_param("ii", $id, $mid);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);
    
    if (count($results) > 0) {
        $outcome = true;
    }

    return $outcome;
}

function getReviewedMovies($id) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Reviews  WHERE u_ID = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    return $results;
}

function getRatedMovies($id) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Ratings  WHERE uID = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    return $results;
}

function getWatchlistMovies($id) {
    $watchID = getWatchlistId($id);
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM List_Items  WHERE lID = ?");
    $query->bind_param("i", $watchID);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    return $results;
}

function getSeenlistMovies($id) {
    $seenID = getSeenlistId($id);
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM List_Items  WHERE lID = ?");
    $query->bind_param("i", $seenID);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    return $results;
}

function getMyRate($id, $mid) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Ratings WHERE uID = ? and mID = ?");
    $query->bind_param("ii", $id, $mid);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    return $results[0]['rating'];
}

function getMyReview($id, $mid) {
    $db = get_mysqli_connection();
    $query = $db->prepare("SELECT * FROM Reviews WHERE u_ID = ? and mID = ?");
    $query->bind_param("ii", $id, $mid);
    $query->execute();
    $result = $query->get_result();
    $results = $result->fetch_all(MYSQLI_ASSOC);

    return $results[0]['critique'];
}

/*-----------------------------------------------GENERAL-----------------------------------------------*/
function consoleLog($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>