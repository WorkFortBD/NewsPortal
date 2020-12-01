import Axios from "axios";

export const getPrayerData = async (district_id=2) => {
    return await Axios.get(`http://localhost:82/NewsPortal/api/prayers/${district_id}`)
    .then((res) => {
        return res.data;
    });
}