import axios from "axios";

export default {
    getfirstquestion(lang_id) {
        return axios.get(
            document.location.origin + "/api/getfirstquestion/" + lang_id
        );
    },
};
