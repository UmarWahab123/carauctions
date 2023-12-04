import axios from "axios";

export default {
    questionresponse(data) {
        return axios.post(
            document.location.origin + "/api/questionresponse",
            data
        );
    },
};
