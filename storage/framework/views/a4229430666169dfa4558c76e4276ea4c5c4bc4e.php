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
            <?php echo e(__('Teachers')); ?>

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
                <?php if(auth()->user()->can('add teacher')): ?>
                    <a href="<?php echo e(route('add-teacher')); ?>" class="btn btn-success mb-4">Add new teacher</a>
                <?php endif; ?>
                <?php if(auth()->user()->can('show teacher')): ?>
                        <nav class="navbar navbar-light bg-light">
                            <form action="<?php echo e(url('search')); ?>" method="get" class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_name">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </nav>
                        <p>Sort by genres: </p>
                        <a class="btn btn-primary" style="color:white" href="http://localhost/c/public/dashboard">All</a></button>
                        <a class="btn btn-primary" style="color:white" href="http://localhost/c/public/dashboard?genre=Rap">Rap</a></button>
                        <a class="btn btn-primary"  style="color:white" href="http://localhost/c/public/dashboard?genre=Rock">Rock</a></button>
                        <a class="btn btn-primary" style="color:white" href="http://localhost/c/public/dashboard?genre=Metal">Metal</a></button>
                        <br><br>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-4">
                            <h5 class="card-header"><a href="<?php echo e(route('detail',$post->id)); ?>"><?php echo e($post->name); ?></a></h5>
                            <div class="card-body">
                                <p><?php echo e($post->genre); ?></p>
                                <p><?php echo e($post->text); ?></p>
                                <p><?php echo e($post->price); ?> р.</p>
                                <?php if(auth()->user()->can('edit teacher')): ?>
                                    <a href="<?php echo e(route('edit-teacher', $post->id)); ?>" class="btn btn-primary">Edit</a>
                                <?php endif; ?>
                                <?php if(auth()->user()->can('delete teacher')): ?>
                                    <form action="<?php echo e(route('delete-teacher', $post->id)); ?>" method="post" style="display: inline-block">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\OpenServer\domains\localhost\cursachh\resources\views/teachers.blade.php ENDPATH**/ ?>