{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

<div class="object-cover pb-5 rounded-lg bg-containerColor drop-shadow-2xl modal" id="confirm-modal">
    <div class="p-2 px-10 py-4 text-right rounded-t-lg bg-primary md:px-10">
        <h1 class="pt-3 text-2xl font-bold text-center text-white font-robotoBold">Delete Employee's Information</h1>
    </div>
    <div class="flex items-center justify-center px-5 py-2 text-center md:px-10 md:py-2">
        <p class="px-3 mx-2 font-semibold font-robotoBold">
            Employee No. | Employee's Name : <br>
            <span class="font-bold font-italic">
                {{  $employeeDetails->employee_no  }} | {{ $employeeDetails->firstname }}
                {{ $employeeDetails->middlename }} {{ $employeeDetails->lastname }}
            </span> <br> <br>
            <span class="text-lg font-medium font-robotoBold">Are you sure you want to delete this Employee permanently?</span>
        </p>
    </div>

    <div class="flex items-center justify-center ">
        <a href="" class="px-4 py-2 font-semibold text-white rounded-md cursor-pointer bg-secondary hover:bg-hovered close">
            Cancel
        </a>&nbsp;&nbsp;&nbsp;
        <a href="{{ route('superadmin.forceDelete-employee', $employeeDetails->id) }}"
            class="px-4 py-2 font-semibold text-white bg-red-700 rounded-md hover:bg-red-600">
            Delete Permanenlty?
        </a>
    </div>
</div>
