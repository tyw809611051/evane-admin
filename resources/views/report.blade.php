<!DOCTYPE html>
<html>
<head>
 <title>测试pdf</title>

 <style>
  @font-face {
   font-family: 'msyh';
   font-style: normal;
   font-weight: normal;
   src: url(http://www.admin.evane.com/fonts/msyh.ttf) format('truetype');
  }
  html, body {  height: 100%;  }
  body {  margin: 0;  padding: 0;  width: 100%;
   /*display: table;  */
   font-weight: 100;  font-family: 'msyh';  }
  .container {  text-align: center;
   /*display: table-cell; */
   vertical-align: middle;  }

  .cover-title {
   font-size: 40px;
   /*font-weight: bold;*/
  }

  .cover-middle {
   margin-top: 5%;
  }
  .cover-middle > table {
   /*width: 30%;*/
   border-collapse:separate;
   border-spacing:0px 10px;
  }

  .cover-bottom {
   margin: 5% auto 5%;

  }
  .cover-bottom-submitted  table {
   margin: 10% auto;
   width: 60%;
   border-collapse:separate;
   border-spacing:0px 30px;
  }

  .abstract-title ,.workstage-img-title,.attention-matters-title{
   font-size: 30px;
  }

  .abstract-general-part {
   margin:2% 0 2% 0;
  }

  .abstract-general-part-title {
   font-size:20px;
   padding-right:40%;
  }

  .abstract-general-part > table, #inspection-result {
   width:100%;
  }

  .abstract-inspection-title {
   margin-top:60px;
   font-size:20px;
   padding-right: 55%;
  }

  #general_part, #general_part tr,#general_part td {
   height: 50px;
   border: 1px solid black;

  }

  #inspection-result, #inspection-result tr,#inspection-result td {
   height: 50px;
   border: 1px solid black;
  }

  .workstage-img {
   margin:3% 0 3% 0;
  }
  .workstage-img > p {
   font-size: 25px;
  }

  .workstage-img > table,.workstage-img > table tr ,.workstage-img > table td {
   width:100%;
   height: 50px;
   border: 1px solid black;
  }

  .matters , .address-info{
   text-align: left;
  }

  .matters > li, .address-info > li {
   margin: 10px;
  }

  table {
   width: 50%;
   margin: auto;
   text-align: left;
   border-collapse: collapse;
  }

  .page-break {
   page-break-after: always;
  }

 </style>
</head>
<body>
<div class="container">
 <!-- 封页 -->
 <div class="cover">

  <div class="cover-title">
   <div>元器件到货检验报告</div>
   <div>EEE Incoming Inspection Report</div>
  </div>

  <div class="cover-middle">
   <table>
    <tr>
     <td>委托单位/CUSTOMER:</td>
     <td>{{ $data['contents']['covers']['customer'] }}</td>
    </tr>
    <tr>
     <td>器件类型/PART TYPE:</td>
     <td>{{ $data['contents']['covers']['part_name'] }}</td>
    </tr>
    <tr>
     <td>型号规格/PART NUMBER:</td>
     <td>{{ $data['contents']['covers']['part_number'] }}</td>
    </tr>
    <tr>
     <td>生产厂商/MANUFACTURER</td>
     <td>{{ $data['contents']['covers']['manufacturer'] }}</td>
    </tr>
    <tr>
     <td>质量等级/ QUALITY LEVEL:</td>
     <td>{{ $data['contents']['covers']['quantity'] }}</td>
    </tr>
    <tr>
     <td>生产批号/LOT DATE CODE</td>
     <td>{{ $data['contents']['covers']['lot_date_code'] }}</td>
    </tr>
    <tr>
     <td>数量/QUANTITY:</td>
     <td>{{ $data['contents']['covers']['quantity'] }}</td>
    </tr>
   </table>
  </div>

  <div class="cover-bottom">
   <div>检验结论/INSPECTION RESULT</div>
   <div>■{{ $data['contents']['covers']['lot_disposition']['text'] }}</div>
   <div class="cover-bottom-submitted">
    <table>
     <tr>
      <td>编写/SUBMITTED BY:</td>
      <td>__________________________</td>
     </tr>
     <tr>
      <td>校对/CHECKED BY:</td>
      <td>__________________________</td>
     </tr>
     <tr>
      <td>批准/APPROVED BY:</td>
      <td>__________________________</td>
     </tr>
    </table>
   </div>

  </div>
 </div>
 <div class="page-break"></div>
 <!-- 摘要 -->
 <div class="abstract">
  <div class="abstract-title">报告摘要表SUMMARY</div>
  <div class="abstract-general-part">
   <div class="abstract-general-part-title">样品特征GENERAL PART INFORMATION</div>
   <table id="general_part">
    <tr>
     <td>元器件名称/PART NAME</td>
     <td>{{ $data['contents']['summary']['general']['part_name'] }}</td>
     <td>型号规格/PART NUMBER</td>
     <td>{{ $data['contents']['summary']['general']['part_number'] }}</td>
    </tr>
    <tr>
     <td>生产厂商MANUFACTURER</td>
     <td>{{ $data['contents']['summary']['general']['manufacturer'] }}</td>
     <td>样品批号LOT DATE CODE</td>
     <td>{{ $data['contents']['summary']['general']['lot_date_code'] }}</td>
    </tr>
    <tr>
     <td>数量/QUANTITY</td>
     <td>{{ $data['contents']['summary']['general']['quantity'] }}</td>
     <td>质量等级/QUALITY LEVEL</td>
     <td>{{ $data['contents']['summary']['general']['quality_level'] }}</td>
    </tr>
    <tr>
     <td>委托单位/CUSTOMER</td>
     <td colspan="3">{{ $data['contents']['summary']['general']['customer'] }}</td>

    </tr>
    <tr>
     <td>执行标准/SPECIFICATIONS</td>
     < colspan="3">
      @foreach($data['contents']['summary']['general']['specifications'] as $specifications)
       {{ $specifications['name'] }}<br />
     @endforeach
     </td>

    </tr>
   </table>
  </div>

  <div class="abstract-inspection-title">检验结果INSPECTION RESULT</div>
  <table id="inspection-result">
   <tr>
    <td>合格样品数/QUALIFIED SAMPLE QUANTITY</td>
    <td>haha</td>
    <td>不合格样品数/FAILED SAMPLE QUANTITY</td>
    <td>haha</td>
   </tr>
   <tr>
    <td>检查内容INSPECTION ITEM</td>
    <td colspan="3">haha</td>
   </tr>
   <tr>
    <td>外部标识EXTERNAL MARKING</td>
    <td colspan="3">haha</td>
   </tr>
   <tr>
    <td>标志一致性检查</td>
    <td colspan="3">haha</td>
   </tr>
   <tr>
    <td>缺陷DEFECT</td>
    <td colspan="3">haha</td>
   </tr>
   <tr>
    <td>评价说明COMMENTS</td>
    <td colspan="3">haha</td>
   </tr>
   <tr>
    <td>检验日期INSPECTION DATE</td>
    <td colspan="3">haha</td>
   </tr>
  </table>
 </div>
 <div class="page-break"></div>
 <!-- 图片 -->
 <div class="workstage-img">
  <div class="workstage-img-title">图片</div>
  <table>
   <tr><td></td></tr>
   <tr><td>图片编号FIGURE NO:</td></tr>
   <tr><td>样品编号SAMPLE NO:</td></tr>
   <tr><td>注释COMMENTS:</td></tr>
  </table>
 </div>
 <div class="page-break"></div>
 <!-- 注意事项 -->
 <div class="attention-matters">
  <div class="attention-matters-title">注意事项</div>
  <div>
   <ol class="matters">
    <li>报告无试验单位印章和骑缝章无效</li>
    <li>复制报告未重新加盖试验单位印章无效。</li>
    <li>报告无编写、校对、批准人签字无效。</li>
    <li>报告涂改、自行增删无效。</li>
    <li>只对委托样品的试验结果负责。</li>
    <li>对本报告若有异议，应在收到报告十五日内向试验单位提出。</li>
   </ol>

   <ol class="address-info">
    <li>地址：北京市海淀区邓庄南路9号（航天城）</li>
    <li>邮编：100094</li>
    <li>电话：（010）82178248</li>
    <li>传真：（010）82178248-17</li>
    <li>电子邮箱：kkx-service@csu.ac.cn</li>
    <li>网站:http：//www.csu.cas.cn http：//www.cissdata.com</li>
   </ol>
  </div>

 </div>
</div>
</body>
</html>