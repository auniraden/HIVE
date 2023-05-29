<?php

include("config.php");
if(isset($_GET['search'])) {
    $searchName = $_GET["search"];
    $sql = "SELECT * FROM member WHERE Name LIKE '%$searchName%'";
    $result = mysqli_query($con, $sql);
    $data = "";

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result))
        {
            $id = $row['MemberID'];
            $name = $row['Name'];
            $email = $row['Email'];
            $memberStatus = $row["Status"];
            $memberStatusCode;
            if($memberStatus) {
                $memberStatusCode = '<span class="badge bg-primary rounded-3 fw-semibold">Active</span>';
            }
            else {
                $memberStatusCode = '<span class="badge bg-danger rounded-3 fw-semibold">Inactive</span>';
            }
            $data .= '
                <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">'. $id .'</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">'. $name .'</h6>
                    </td>
                    <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">'. $email .'</p>
                    </td>
                    <td class="border-bottom-0">
                        <div class="d-flex align-items-center gap-2">
                            '. $memberStatusCode .'
                        </div>
                    </td>
                    <td>
                        <a href="edit-member.php?id='. $id .'">
                            <i class="ti ti-ballpen admin-to-user-action-icon" data-bs-toggle="tooltip" title="Edit"></i>
                        </a>
                        <!-- <a href="#" class="member-view" data-bs-toggle="modal" data-bs-target="#showUserDetails" data-id="'. $id .'"><i class="ti ti-eye admin-to-user-action-icon"></i></a> -->
                        <a href="#" class="member-delete" data-id="'. $id .'" data-bs-toggle="modal" data-bs-target="#delete-modal">
                            <i class="ti ti-trash admin-to-user-action-icon" data-bs-toggle="tooltip" title="Delete"></i>
                        </a>
                    </td>
                </tr>
            ';
        };
    }
    else {
        $data = '
            <tr>
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">-</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">-</h6>
                </td>
                <td class="border-bottom-0">
                <p class="mb-0 fw-normal">-</p>
                </td>
                <td class="border-bottom-0">
                <div class="d-flex align-items-center gap-2">
                    -
                </div>
                </td>
                <td>
                -
                </td>
            </tr>
        ';
    }
    echo $data;
}
?>