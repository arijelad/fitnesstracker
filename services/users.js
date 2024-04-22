var UserService = {
    reload_users_datatable: function () {
        Utils.get_datatable(
            "tbl_users",
            Constants.API_BASE_URL + "get_patients.php", // get_users.php
            [
                {data: "email"},
                {data: "password"},
            ]
        );
    },
};