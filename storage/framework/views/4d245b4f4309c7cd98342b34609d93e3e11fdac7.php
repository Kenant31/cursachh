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
                <?php if(auth()->user()->can('show teacher')): ?>
                    <br><br>
                        <div class="card mb-4">
                            <h5 class="card-header"><?php echo e($posts->name); ?></h5>
                            <div class="card-body">
                                <p><?php echo e($posts->genre); ?></p>
                                <p><?php echo e($posts->text); ?></p>
                                <p><?php echo e($posts->price); ?> р.</p>
                                <?php if(auth()->user()->can('edit teacher')): ?>
                                    <a href="<?php echo e(route('edit-teacher', $posts->id)); ?>" class="btn btn-primary">Edit</a>
                                <?php endif; ?>
                                <?php if(auth()->user()->can('delete teacher')): ?>
                                    <form action="<?php echo e(route('delete-teacher', $posts->id)); ?>" method="post" style="display: inline-block">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>

                            </div>
                            <div class="container">
                                <form style="margin-top: 50px;" class="space-y-5" method="POST" action="<?php echo e(route('comment.store', $posts->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <h5>Comment</h5>
                                    <div style="display: flex; align-items: center;">

                                        <input id="comment_body" type="text" name="comment_body" class="block w-1000px py-3 px-3 mt-2 text-gray-800 appearance-none border-3 border-gray-100 ">
                                        <input type="hidden" name="post_id" value="<?php echo e($posts->id); ?>" />
                                        <?php $__errorArgs = ['comment_body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-sm text-red-400"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <button type="submit"  style="height: 50px; margin-left: 20px" class="btn btn-success mb-4">
                                            Create
                                        </button>
                                    </div>
                                </form>


                                <div class="relative overflow-x-auto shadow-md bg-grey-200 sm:rounded-lg py-20" style="margin-top: 50px;">
                                    <table class="w-full text-sm text-left text-grey-500 dark:text-grey-400">
                                        <?php $__currentLoopData = $posts->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    <?php echo e($comment->user->name); ?>

                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>

                                            <thead>
                                            <tbody>
                                            <tr class="bg-white border-b dark:bg-grey-800 dark:border-grey-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-grey-900">
                                                    <?php echo e($comment->comment_body); ?>

                                                </th>

                                                <td class="px-6 py-4 text-right">
                                                    <div class="flex space-x-2">
                                                        <?php if((Auth::check() && Auth::id() == $comment->user_id) || auth()->user()->hasRole('super-user')): ?>
                                                            <a href="<?php echo e(route('comment.edit', ['id' => $posts->id, 'comm' => $comment->id])); ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" style="padding-right: 10px">Edit</a>


                                                            <form method="POST" action="<?php echo e(route('comment.delete', ['id' => $posts->id, 'comm' => $comment->id])); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                            </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
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
<?php /**PATH C:\OpenServer\domains\localhost\cursachh\resources\views/detail.blade.php ENDPATH**/ ?>