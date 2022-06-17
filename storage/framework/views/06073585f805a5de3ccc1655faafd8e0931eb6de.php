<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Roles')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <?php if(session('status')): ?>
                    <div class="alert alert-success mt-4">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-success mb-4">Add new role</a>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-4">
                        <h5 class="card-header"><?php echo e($role->name); ?></h5>
                        <div class="card-body">
                            <a href="<?php echo e(route('roles.edit', $role->id)); ?>" class="btn btn-primary">Edit</a>
                            <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="post" style="display: inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\Temp\OSPanel\domains\localhost\music-school-proj\resources\views/roles/index.blade.php ENDPATH**/ ?>