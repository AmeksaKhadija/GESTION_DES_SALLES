@extends('layout')
@section('statistics')
<div class="container-fluid">
    <div class="card shadow border-0 mb-7">
        <div class="table-responsive">
            <?php if (!empty($salles)): ?>

                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Descrition Courte</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Enseignant</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php foreach ($salles as $salle): ?> -->
                        <tr>
                            <td>
                                <a class="text-heading font-semibold" href="#">
                                    <?= $salles->getTitre(); ?>
                                </a>
                            </td>
                            <td>
                                <a class="text-heading font-semibold" href="#">
                                    <?= $salles->getDescriptionCourte(); ?>
                                </a>
                            </td>
                            <td>
                                <a class="text-heading font-semibold" href="#">
                                    <?= $salles->getIdCategorie(); ?>
                                </a>
                            </td>
                            <td>
                                <a class="text-heading font-semibold" href="#">
                                    <?= $salles->getTags(); ?>
                                </a>
                            </td>
                            <td>
                                <a class="text-heading font-semibold" href="#">
                                    <?= $salles->getEnseignant(); ?>
                                </a>
                            </td>
                            <td>
                                <a class="text-heading font-semibold" href="#">
                                    <?= $salle->getStatus(); ?>
                                </a>
                            </td>
                            <td class="d-flex gap-2">
                                <form method="POST" action="/ModifierStatusCour">
                                    <input type="hidden" name="id" value="<?= $salle->getId(); ?>">
                                    <input type="hidden" name="status" value="active">
                                    <input type="submit" class="btn btn-sm btn-neutral" value="Activer">
                                </form>
                                <form method="POST" action="/ModifierStatusCour">
                                    <input type="hidden" name="id" value="<?= $salle->getId(); ?>">
                                    <input type="hidden" name="status" value="rejeter">
                                    <input type="submit" class="btn btn-sm btn-neutral" value="Rejeter">
                                </form>
                                <form method="POST" action="/DeletUser">
                                    <input type="hidden" name="id" value="<?= $salle->getId(); ?>">
                                    <input type="submit" class="btn btn-sm btn-neutral" value="Supremer">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Aucun salle trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
@endsection