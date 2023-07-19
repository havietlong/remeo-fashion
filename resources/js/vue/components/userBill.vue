<template>
    <div class="productsTab">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Loại yêu cầu</th>
                    <th>Nội dung yêu cầu</th>
                    <th>Người yêu cầu</th>
                    <th>Người thực hiện</th>
                    <th>Ghi chú</th>
                    <th>Tiến độ xử lí</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Loại 1</td>
                    <td>Nội dung yêu cầu 1</td>
                    <td>Người yêu cầu 1</td>
                    <td>Người thực hiện 1</td>
                    <td>Ghi chú 1</td>
                    <td>Đang xử lí</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="panel">
                            <!-- Content of the panel goes here -->
                            <h3>Panel content 1</h3>
                            <p>Additional details can be added here.</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Loại 2</td>
                    <td>Nội dung yêu cầu 2</td>
                    <td>Người yêu cầu 2</td>
                    <td>Người thực hiện 2</td>
                    <td>Ghi chú 2</td>
                    <td>Hoàn thành</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="panel">
                            <!-- Content of the panel goes here -->
                            <h3>Panel content 2</h3>
                            <p>Additional details can be added here.</p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style scoped>
.productsTab table {
    width: 100%;
    border-collapse: collapse;
}

.productsTab th,
.productsTab td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.productsTab th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.productsTab tr:nth-child(even) {
    background-color: #f9f9f9;
}
</style>
<script>
import $ from 'jquery';
export default {
    mounted() {
        $(".productsTab tbody tr").each(function () {
            $(this).next("tr").find(".panel").hide();
        });

        $(".productsTab tbody tr").click(function () {
            var panel = $(this).next("tr").find(".panel");
            panel.slideToggle("slow");
        });
    }
}
</script>