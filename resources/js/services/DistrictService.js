import Axios from "axios";

export const getDistrictData = async () => {
    let items = [];
    await Axios.get('http://localhost:82/NewsPortal/api/districts')
    .then((res) => {
        res.data.map((item, index) => {
            const itemNew = {
                label: item.district_name,
                value: item.id,
            }
            items.push(itemNew);
        });
    });
    return items;
}