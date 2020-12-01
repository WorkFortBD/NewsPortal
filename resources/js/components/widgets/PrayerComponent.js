import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from 'axios';
import Select from 'react-select'
import { getDistrictData } from "../../services/DistrictService";
import { getPrayerData } from "../../services/PrayerService";


function PrayerComponent() {
    const [districts, setDistricts] = useState([]);
    const [prayerList, setPrayerList] = useState([]);

    useEffect(() => {
        initializeData();
    }, []);

    const initializeData = async () => {
        const districts = await getDistrictData();
        const prayerList = await getPrayerData(2);
        setDistricts(districts);
        setPrayerList(prayerList);
    }

    const selectDistrict = async (district) => {
        const prayerList = await getPrayerData(district.value);
        setPrayerList(prayerList);
    }


    return (

        <div className="HadithBox NamazBox">
            <h2> নামাজের সময়সূচী
                <Select options={districts} onChange={e => selectDistrict(e)}/>
            </h2>


            <div className="namazList">
                <table>

                    <thead>
                        <tr>
                            <th>নামাজের নাম</th>
                            <th>নামাজের সময়</th>
                        </tr>
                    </thead>
                    <tbody>
                        {
                            prayerList.map((prayer, index) => (
                                <tr key={index}>
                                    <td>{prayer.prayer_name_bn}</td>
                                    <td>{prayer.prayer_time_bn}</td>
                                </tr>
                            ))
                        }
                    </tbody>
                </table>
            </div>
        </div>
    );
}

export default PrayerComponent;

if (document.getElementById("prayer")) {
    ReactDOM.render(<PrayerComponent />, document.getElementById("prayer"));
}
