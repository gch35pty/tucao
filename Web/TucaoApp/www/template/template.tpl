    {@each data as tucao,index}
    <div style="border-bottom: 1px solid #dddddd;background: #eeeeee">
        <table style="width:100%;">
            <tr>
                <td align="left" valign="top" style="font-size: 10px;padding: 5px" onclick="detail (${tucao.TC_TUCAO})">
                    <span>${tucao.CONTENT}</span>
                </td>
                <td style="width: 40px">
                    <div align="center" style="width: 100%">
                        <div onclick="upClick(this);" style="font-size: 0px">
                            <img src="icons/ios7-arrow-up.png" width="30px" height="25px"/>
                        </div>
                        <div style="font-size: 12px">
                            <span>0</span>
                        </div>
                        <div onclick="downClick(this);" style="font-size: 0px">
                            <img src="icons/ios7-arrow-down.png" width="30px" height="25px"/>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <table style="width: 100%;height: 20px;font-size: 8px;padding-right: 40px">
            <tr>
                <td width="25%" style="padding-left: 5px">
                    <span id="t_interval">${tucao.CREATE_TIME|jsDateDiff}</span>
                </td>
                <td width="25%" align="center">
                    <span>200m</span>
                </td>
                <td width="25%" align="center">
                    <i class="icon mail"></i>
                    <span>30</span>
                </td>
                <td width="25%" align="right">
                    <span>吐槽超人gc</span>
                </td>
            </tr>
        </table>
    </div>
    {@/each}
