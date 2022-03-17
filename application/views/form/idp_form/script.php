<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.js') ?>"></script>
<script type="text/javascript">
    $(document).on('change', '.select_learning_cc', function() {
        var value = this.value;
        const row = $(this).data('index');
        if (value == '70%') {
            $(this).closest('tr').find('#textbox_model_cc').html(`<select id="select_model" class="custom-select" name="params_cc[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ">Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Job Enrichment การเพิ่มคุณค่าในงาน">Job Enrichment การเพิ่มคุณค่าในงาน</option>
				<option value="Job Enlargement การเพิ่มปริมาณงาน">Job Enlargement การเพิ่มปริมาณงาน</option>
				<option value="Job Rotation การหมุนเวียน">Job Rotation การหมุนเวียน</option>
				<option value="Know ledge Sharing การแลกเปลี่ยนความรู้">Know ledge Sharing การแลกเปลี่ยนความรู้</option>
				<option value="On the job Training การฝึกอบรมในงาน">On the job Training การฝึกอบรมในงาน</option>
				<option value="Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน">Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน</option>
				<option value="Activity การทำกิจกรรม">Activity การทำกิจกรรม</option>
				<option value="Site Visit การดูงานนอกสถานที่">Site Visit การดูงานนอกสถานที่</option>
				<option value="Special Projects การรับผิดชอบโครงการพิเศษ">Special Projects การรับผิดชอบโครงการพิเศษ</option>
				</select>`);
        } else if (value == '20%') {
            $(this).closest('tr').find('#textbox_model_cc').html(`<td>
				<select id="select_model" class="custom-select" name="params_cc[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Coaching การสอนแนะ">Coaching การสอนแนะ</option>
				<option value="Mentoring การเป็นพี่เลี้ยง">Mentoring การเป็นพี่เลี้ยง</option>
				<option value="Teaching การสอน">Teaching การสอน</option>
				<option value="Informal Coaching การสอนแนะแบบไม่เป็นทางการ">Informal Coaching การสอนแนะแบบไม่เป็นทางการ</option>
				<option value="Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย">Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย</option>
				<option value="Meeting/ Seminar การประชุม/สัมมนา">Meeting/ Seminar การประชุม/สัมมนา</option>
				</select>
				</td>`);
        } else if (value == '10%') {
            $(this).closest('tr').find('#textbox_model_cc').html(`<td>
				<select id="select_model" class="custom-select" name="params_cc[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="In-House Training การฝึกอบรมภายใน">In-House Training การฝึกอบรมภายใน</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Public Training การฝึกอบรมภายนอก">Public Training การฝึกอบรมภายนอก</option>
				<option value="Seminar การเข้าร่วมสัมมนา">Seminar การเข้าร่วมสัมมนา</option>
				<option value="Self-Learning การเรียนรู้ด้วยตนเอง">Self-Learning การเรียนรู้ด้วยตนเอง</option>
				</td>`);
        } else {
            $('#textbox_model_cc').html('');
        }
    });

    $(document).on('change', '.select_learning_mc', function() {
        var value = this.value;
        const row = $(this).data('index');
        if (value == '70%') {
            $(this).closest('tr').find('#textbox_model_mc').html(`<select id="select_model" class="custom-select" name="params_mc[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ">Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Job Enrichment การเพิ่มคุณค่าในงาน">Job Enrichment การเพิ่มคุณค่าในงาน</option>
				<option value="Job Enlargement การเพิ่มปริมาณงาน">Job Enlargement การเพิ่มปริมาณงาน</option>
				<option value="Job Rotation การหมุนเวียน">Job Rotation การหมุนเวียน</option>
				<option value="Know ledge Sharing การแลกเปลี่ยนความรู้">Know ledge Sharing การแลกเปลี่ยนความรู้</option>
				<option value="On the job Training การฝึกอบรมในงาน">On the job Training การฝึกอบรมในงาน</option>
				<option value="Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน">Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน</option>
				<option value="Activity การทำกิจกรรม">Activity การทำกิจกรรม</option>
				<option value="Site Visit การดูงานนอกสถานที่">Site Visit การดูงานนอกสถานที่</option>
				<option value="Special Projects การรับผิดชอบโครงการพิเศษ">Special Projects การรับผิดชอบโครงการพิเศษ</option>
				</select>`);
        } else if (value == '20%') {
            $(this).closest('tr').find('#textbox_model_mc').html(`<td>
				<select id="select_model" class="custom-select" name="params_mc[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Coaching การสอนแนะ">Coaching การสอนแนะ</option>
				<option value="Mentoring การเป็นพี่เลี้ยง">Mentoring การเป็นพี่เลี้ยง</option>
				<option value="Teaching การสอน">Teaching การสอน</option>
				<option value="Informal Coaching การสอนแนะแบบไม่เป็นทางการ">Informal Coaching การสอนแนะแบบไม่เป็นทางการ</option>
				<option value="Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย">Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย</option>
				<option value="Meeting/ Seminar การประชุม/สัมมนา">Meeting/ Seminar การประชุม/สัมมนา</option>
				</select>
				</td>`);
        } else if (value == '10%') {
            $(this).closest('tr').find('#textbox_model_mc').html(`<td>
				<select id="select_model" class="custom-select" name="params_mc[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="In-House Training การฝึกอบรมภายใน">In-House Training การฝึกอบรมภายใน</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Public Training การฝึกอบรมภายนอก">Public Training การฝึกอบรมภายนอก</option>
				<option value="Seminar การเข้าร่วมสัมมนา">Seminar การเข้าร่วมสัมมนา</option>
				<option value="Self-Learning การเรียนรู้ด้วยตนเอง">Self-Learning การเรียนรู้ด้วยตนเอง</option>
				</td>`);
        } else {
            $('#textbox_model_mc').html('');
        }
    });

    $(document).on('change', '.select_learning_know', function() {
        var value = this.value;
        const row = $(this).data('index');
        if (value == '70%') {
            $(this).closest('tr').find('#textbox_model_know').html(`<select id="select_model" class="custom-select" name="params_know[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ">Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Job Enrichment การเพิ่มคุณค่าในงาน">Job Enrichment การเพิ่มคุณค่าในงาน</option>
				<option value="Job Enlargement การเพิ่มปริมาณงาน">Job Enlargement การเพิ่มปริมาณงาน</option>
				<option value="Job Rotation การหมุนเวียน">Job Rotation การหมุนเวียน</option>
				<option value="Know ledge Sharing การแลกเปลี่ยนความรู้">Know ledge Sharing การแลกเปลี่ยนความรู้</option>
				<option value="On the job Training การฝึกอบรมในงาน">On the job Training การฝึกอบรมในงาน</option>
				<option value="Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน">Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน</option>
				<option value="Activity การทำกิจกรรม">Activity การทำกิจกรรม</option>
				<option value="Site Visit การดูงานนอกสถานที่">Site Visit การดูงานนอกสถานที่</option>
				<option value="Special Projects การรับผิดชอบโครงการพิเศษ">Special Projects การรับผิดชอบโครงการพิเศษ</option>
				</select>`);
        } else if (value == '20%') {
            $(this).closest('tr').find('#textbox_model_know').html(`<td>
				<select id="select_model" class="custom-select" name="params_know[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Coaching การสอนแนะ">Coaching การสอนแนะ</option>
				<option value="Mentoring การเป็นพี่เลี้ยง">Mentoring การเป็นพี่เลี้ยง</option>
				<option value="Teaching การสอน">Teaching การสอน</option>
				<option value="Informal Coaching การสอนแนะแบบไม่เป็นทางการ">Informal Coaching การสอนแนะแบบไม่เป็นทางการ</option>
				<option value="Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย">Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย</option>
				<option value="Meeting/ Seminar การประชุม/สัมมนา">Meeting/ Seminar การประชุม/สัมมนา</option>
				</select>
				</td>`);
        } else if (value == '10%') {
            $(this).closest('tr').find('#textbox_model_know').html(`<td>
				<select id="select_model" class="custom-select" name="params_know[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="In-House Training การฝึกอบรมภายใน">In-House Training การฝึกอบรมภายใน</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Public Training การฝึกอบรมภายนอก">Public Training การฝึกอบรมภายนอก</option>
				<option value="Seminar การเข้าร่วมสัมมนา">Seminar การเข้าร่วมสัมมนา</option>
				<option value="Self-Learning การเรียนรู้ด้วยตนเอง">Self-Learning การเรียนรู้ด้วยตนเอง</option>
				</td>`);
        } else {
            $('#textbox_model_know').html('');
        }
    });

    $(document).on('change', '.select_learning_skill', function() {
        var value = this.value;
        const row = $(this).data('index');
        if (value == '70%') {
            $(this).closest('tr').find('#textbox_model_skill').html(`<select id="select_model" class="custom-select" name="params_skill[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ">Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Job Enrichment การเพิ่มคุณค่าในงาน">Job Enrichment การเพิ่มคุณค่าในงาน</option>
				<option value="Job Enlargement การเพิ่มปริมาณงาน">Job Enlargement การเพิ่มปริมาณงาน</option>
				<option value="Job Rotation การหมุนเวียน">Job Rotation การหมุนเวียน</option>
				<option value="Know ledge Sharing การแลกเปลี่ยนความรู้">Know ledge Sharing การแลกเปลี่ยนความรู้</option>
				<option value="On the job Training การฝึกอบรมในงาน">On the job Training การฝึกอบรมในงาน</option>
				<option value="Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน">Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน</option>
				<option value="Activity การทำกิจกรรม">Activity การทำกิจกรรม</option>
				<option value="Site Visit การดูงานนอกสถานที่">Site Visit การดูงานนอกสถานที่</option>
				<option value="Special Projects การรับผิดชอบโครงการพิเศษ">Special Projects การรับผิดชอบโครงการพิเศษ</option>
				</select>`);
        } else if (value == '20%') {
            $(this).closest('tr').find('#textbox_model_skill').html(`<td>
				<select id="select_model" class="custom-select" name="params_skill[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Coaching การสอนแนะ">Coaching การสอนแนะ</option>
				<option value="Mentoring การเป็นพี่เลี้ยง">Mentoring การเป็นพี่เลี้ยง</option>
				<option value="Teaching การสอน">Teaching การสอน</option>
				<option value="Informal Coaching การสอนแนะแบบไม่เป็นทางการ">Informal Coaching การสอนแนะแบบไม่เป็นทางการ</option>
				<option value="Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย">Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย</option>
				<option value="Meeting/ Seminar การประชุม/สัมมนา">Meeting/ Seminar การประชุม/สัมมนา</option>
				</select>
				</td>`);
        } else if (value == '10%') {
            $(this).closest('tr').find('#textbox_model_skill').html(`<td>
				<select id="select_model" class="custom-select" name="params_skill[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="In-House Training การฝึกอบรมภายใน">In-House Training การฝึกอบรมภายใน</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Public Training การฝึกอบรมภายนอก">Public Training การฝึกอบรมภายนอก</option>
				<option value="Seminar การเข้าร่วมสัมมนา">Seminar การเข้าร่วมสัมมนา</option>
				<option value="Self-Learning การเรียนรู้ด้วยตนเอง">Self-Learning การเรียนรู้ด้วยตนเอง</option>
				</td>`);
        } else {
            $('#textbox_model_skill').html('');
        }
    });

    $(document).on('change', '.select_learning_perattr', function() {
        var value = this.value;
        const row = $(this).data('index');
        console.log(row)
        if (value == '70%') {
            $(this).closest('tr').find('#textbox_model_perattr').html(`<select id="select_model" class="custom-select" name="params_perattr[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ">Job Shadowing/Observation:การติดตาม/สังเกตแม่แบบ</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Job Enrichment การเพิ่มคุณค่าในงาน">Job Enrichment การเพิ่มคุณค่าในงาน</option>
				<option value="Job Enlargement การเพิ่มปริมาณงาน">Job Enlargement การเพิ่มปริมาณงาน</option>
				<option value="Job Rotation การหมุนเวียน">Job Rotation การหมุนเวียน</option>
				<option value="Know ledge Sharing การแลกเปลี่ยนความรู้">Know ledge Sharing การแลกเปลี่ยนความรู้</option>
				<option value="On the job Training การฝึกอบรมในงาน">On the job Training การฝึกอบรมในงาน</option>
				<option value="Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน">Work with Consultants or Internal Experts การทำงานกับที่ปรึกษาหรือผู้เชียวชาญภายใน</option>
				<option value="Activity การทำกิจกรรม">Activity การทำกิจกรรม</option>
				<option value="Site Visit การดูงานนอกสถานที่">Site Visit การดูงานนอกสถานที่</option>
				<option value="Special Projects การรับผิดชอบโครงการพิเศษ">Special Projects การรับผิดชอบโครงการพิเศษ</option>
				</select>`);
        } else if (value == '20%') {
            $(this).closest('tr').find('#textbox_model_perattr').html(`<td>
				<select id="select_model" class="custom-select" name="params_perattr[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="Coaching การสอนแนะ">Coaching การสอนแนะ</option>
				<option value="Mentoring การเป็นพี่เลี้ยง">Mentoring การเป็นพี่เลี้ยง</option>
				<option value="Teaching การสอน">Teaching การสอน</option>
				<option value="Informal Coaching การสอนแนะแบบไม่เป็นทางการ">Informal Coaching การสอนแนะแบบไม่เป็นทางการ</option>
				<option value="Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย">Learning Through Team/Networks การเรียนรู้ผ่านทีม/เครือข่าย</option>
				<option value="Meeting/ Seminar การประชุม/สัมมนา">Meeting/ Seminar การประชุม/สัมมนา</option>
				</select>
				</td>`);
        } else if (value == '10%') {
            $(this).closest('tr').find('#textbox_model_perattr').html(`<td>
				<select id="select_model" class="custom-select" name="params_perattr[${row}][model]">
				<option selected>ระบุLearning Model </option>
				<option value="In-House Training การฝึกอบรมภายใน">In-House Training การฝึกอบรมภายใน</option>
				<option value="Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร">Excutive Job Shadowing : การติดตาม/สังเกตผู้บริหาร</option>
				<option value="Public Training การฝึกอบรมภายนอก">Public Training การฝึกอบรมภายนอก</option>
				<option value="Seminar การเข้าร่วมสัมมนา">Seminar การเข้าร่วมสัมมนา</option>
				<option value="Self-Learning การเรียนรู้ด้วยตนเอง">Self-Learning การเรียนรู้ด้วยตนเอง</option>
				</td>`);
        } else {
            $('#textbox_model_perattr').html('');
        }
    });
</script>